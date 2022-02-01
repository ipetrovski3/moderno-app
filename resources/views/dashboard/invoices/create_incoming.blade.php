@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <h1>Влезна Фактура</h1>
@stop


@section('content')
    <label for="seller">Добавувач:</label>
    <div class="row">
        <div class="col-1">
            <input id="company_id" type="text" name="company_id" class="form-control" value="">
        </div>
        <div class="col-6">
            <input id="company_name" type="text" name="company_name" class="form-control" value="" disabled>
        </div>
    </div>
    <div class="form-group">
        <div class="col-3">
            <label for="date">Датум:</label>
            <input type="date" id="datepicker" name="date" class="form-control">
        </div>
    </div>
    <div id="open_products_panel" hidden>
        <div class="form-group">
            <div class="row input-group">
                <label for="product">Продукт</label>
            </div>
            <div class="row input-group">
                <div class="col-1">
                    <input type="text" name="product" id="product_id" class="form-control products">
                </div>
                <input type='text' id='product_name' name="product_name" class='form-control products'>
                <div class="col-2">
                    <input type="number" id="qty" class="form-control products" placeholder="Количина">
                </div>
                <input type="number" id="price" class="form-control products" placeholder="Цена со ДДВ">
                <button type="button" id="confirm_product" class="btn btn-success"><i class="fas fa-check"></i></button>
            </div>
        </div>
        {{-- render invoice_preview.blade --}}
        <div id="invoiced_full"></div> 
    </div>
        
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
<script>
    let date = new Date()
    console.log(date);
    document.getElementById("datepicker").valueAsDate = date

    $(document).on('click', '.remove', function() {
        let product = $(this).data('product')
        console.log();
        $.ajax({
            type: "POST",
            url: "{{ route('remove.article') }}",
            data: { 
                product
            },
            success: function(data) {
                $('#invoiced_full').empty()
                $('#invoiced_full').append(data)
            }
        })   
    })
    $(document).ready(function() {
        $(document).on('click', '#store_invoice', function() {
            let company_id = $('#company_id').val()

            $.ajax({
                    type: "POST",
                    url: "{{ route('store.incoming.invoice') }}",
                    data: { 
                        company_id
                    },
                    success: function(data) {
                        console.log(data);
                    }
                })    

        })
        $('#confirm_product').on('click', function() {
            let product_id = $('#product_id').val()
            let qty = $('#qty').val()
            let price = $('#price').val()
            let company_id = $('#company_id').val()

            $.ajax({
                    type: "POST",
                    url: "{{ route('invoiced.product') }}",
                    data: { 
                        product_id,
                        qty,
                        price,
                        company_id
                    },
                    success: function(data) {
                        $('#invoiced_full').empty()
                        $('#invoiced_full').append(data)
                        // console.log(data);
                        // console.log('item = ' + data.item.tax);
                        // console.log('total = ' + data.all_products);
                        // console.log('subtotal = ' + data.subtotal);
                        $(".products").val("");
                        // $('#table_body').append('<tr><td>' + data.item.id + '</td><td>' + data.item.name + '</td><td>' + data.item.qty + '</td><td>' + data.item.price + '</td><td>' + data.item.tax + '</td></tr> ')
                        // $('#company_title').text(data.item.options.company)
                    }
                })    

        })
        $('#product_id').keyup(function(e) {
            if (e.keyCode == 13) {
                e.preventDefault();
                return false;
            }
            let product = $(this).val()
            console.log(product);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "{{ route('select.product') }}",
                    data: { product
                    },
                    success: function(data) {
                        console.log(data);
                        $('#product_name').attr('disabled', true).val(data.product)
                    }
                })    

        })



        $('#company_id').keyup(function(e) {
            if (e.keyCode == 13) {
                e.preventDefault();
                return false;
            }
            let company_id = $(this).val()
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{ route('select.company') }}",
                data: { company_id
                },
                success: function(company) {
                    console.log(company.name);
                    if (company.name == undefined) {
                        $('#company_name').val('Не постои компанија со таа шифра')
                        $('#open_products_panel').attr('hidden', true)
                    } else {
                        $('#company_name').val(company.name)
                        $('#open_products_panel').attr('hidden', false)
                    }
                }
            })    
        })


        var max_fields      = 10; //maximum input boxes allowed
        var wrapper         = $(".input_fields_wrap"); //Fields wrapper
        var add_button      = $(".add_field_button"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function(e){ //on add input button click
            e.preventDefault();
            if(x < max_fields){ //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div><input type="text" class="form-control col-6" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
            }
        });

        $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); x--;
        })

        $('#selected').on('change', function() {
            console.log('here');
        $('#company').val()
        $('#company').val($(this).text()) 
        })

        $('#company').on('focusout', function () {
            console.log('defocused');
        })
    })
</script>

@endsection

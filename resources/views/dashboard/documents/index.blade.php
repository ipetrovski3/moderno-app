@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Фактури</h1>


@stop


@section('content')
    <button class="btn btn-success mb-3" hidden id="toggle_button"><i class="fas fa-chevron-down"></i></button>
    <div id="toggle_first" class="mb-3">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="document_select">Избери тип на документ</label>
                    <select class="form-control" id="document_select">
                        <option value="" disabled selected>Избери...</option>
                        <option value="1">1.) Фактура</option>
                        <option value="2">2.) Купувач Во Готово</option>
                        <option value="3">3.) Влезна Фактура од Добавувач</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <hr>
    {{-- render create.blade --}}
    <div class="container" id="documents"></div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#document_select').on('change', function() {
                let document = $(this).val()
                console.log(document);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "{{ route('document.select') }}",
                    data: {
                        document
                    },
                    success: function(data) {
                        $('#documents').html(data);

                    }
                })
            })

            $('#toggle_button').on('click', function() {
                $('#toggle_first').toggle()
            })
        })

        $(document).on('click', '.remove', function() {
            let product = $(this).data('product')
            let company_id = $('#company_id').val()
            console.log('clicked');
            $.ajax({
                type: "POST",
                url: "{{ route('remove.article') }}",
                data: {
                    product, company_id
                },
                success: function(data) {
                    $('#invoiced_full').empty()
                    $('#invoiced_full').append(data)
                }
            })
        })

        $(document).on('click', '#store_invoice', function() {
            let date = $("#datepicker").val()
            let company_id = $('#company_id').val()
            let doc_id = $('#company_id').data('document')
            console.log(doc_id)
            $.ajax({
                type: "POST",
                url: "{{ route('store.document') }}",
                data: {
                    company_id,
                    doc_id,
                    date
                },
                success: function(data) {
                    console.log(data)
                    // window.location.href = data
                }
            })

        })
        $(document).on('click', '#confirm_product', function() {
            // <input type="checkbox" id="ddv_check" checked aria-label="Checkbox for following text input">


            let ddv = $('#ddv_check').prop("checked") == true ? 1 : 0;

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
                    company_id,
                    ddv
                },
                success: function(data) {
                    $('#invoiced_full').empty()
                    $('#invoiced_full').append(data)
                    $(".products").val("");
                }
            })

        })
        $(document).on('keyup', '#product_id', function(e) {
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
                data: {
                    product
                },
                success: function(data) {
                    console.log(data);
                    $('#product_name').attr('disabled', true).val(data.product)
                }
            })

        })

        $(document).on('keyup', '#company_id', function(e) {
            if (e.keyCode == 13) {
                e.preventDefault();
                return false;
            }
            $("#datepicker").datepicker({
                dateFormat: "dd-mm-yy"
            });
            $("#datepicker").datepicker('setDate', 'today')
            $('#toggle_first').toggle()
            $('#toggle_button').attr('hidden', false)
            let company_id = $(this).val()
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{ route('select.company') }}",
                data: {
                    company_id
                },
                success: function(company) {
                    console.log(company);
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
    </script>
@endsection

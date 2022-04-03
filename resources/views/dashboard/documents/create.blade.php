@extends('adminlte::page')

@section('title', 'Материјални Документи')

@section('content_header')
    <h1>Материјални Документи</h1>
@stop

@section('content')

    <div class="text-center">
        <h4>{{ $document_name }}</h4>
    </div>

    <div class="row">

        <label for="seller">{{ $document_id == 3 ? 'ОД:' : 'ДО:' }}</label>
        <div class="col-1">
            <input type="number" id="company_number" data-document="{{ $document_id }}" disabled class="form-control">
        </div>
            <select id="company_name" class="js-example-basic-single" name="company">
                <option value="" selected disabled>Избери коминтент...</option>
                @foreach($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->name != '' ? $company->name : $company->full_name() }}</option>
                @endforeach
            </select>
        <div class="col-3">
            <input class="form-control" name="extra" id="extra" type="text">
        </div>
        <label for="date">Датум:</label>
        <div class="col-2">
            <input type="input" id="datepicker" name="date" class="form-control">
        </div>
        <div class="col-2">
            <div class="form-check">
                <input type="checkbox" id="ddv_check" checked class="form-check-input">
                <label class="form-check-label" for="ddv_check">ДДВ</label>
            </div>
        </div>
    </div>
    <div class="mt-2" id="open_products_panel" hidden>
        <div class="form-group">
            <div class="row input-group">
                <label for="product">Продукт</label>
            </div>
            <div class="row input-group">
                <div class="col-1">
                    <input type="text" disabled name="product" id="product_id" class="form-control products">
                </div>
                <div class="col-6">
                <select id="product_name" class="js-example-basic-single" style="width: 100%" name="product_name">
                    <option value="" selected disabled>Избери продукт...           </option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
                </div>
{{--                <input type='text' id='product_name' name="product_name" class='form-control products'>--}}
                <div class="col-1">
                    <input type="number" id="qty" class="form-control products" placeholder="Количина">
                </div>

                <input type="number" id="price" class="form-control products" placeholder="Цена">
                <button type="button" id="confirm_product" class="btn btn-success"><i class="fas fa-check"></i></button>
            </div>
        </div>
        {{-- render invoice_preview.blade --}}
        <div id="invoiced_full"></div>
    </div>

@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#company_name').select2();
            $('#product_name').select2({
                width: 'resolve'
            });
        });
        $(document).on('click', '.remove', function () {
            let product = $(this).data('product')
            let company_id = $('#company_number').val()
            console.log('clicked');
            $.ajax({
                type: "POST",
                url: "{{ route('remove.article') }}",
                data: {
                    product, company_id
                },
                success: function (data) {
                    $('#invoiced_full').empty()
                    $('#invoiced_full').append(data)
                }
            })
        })

        $(document).on('click', '#store_invoice', function () {
            let date = $("#datepicker").val()
            let company_id = $('#company_number').val()
            let doc_id = $('#company_number').data('document')
            let extra = $('#extra').val()
            console.log('')
            $.ajax({
                type: "POST",
                url: "{{ route('store.document') }}",
                data: {
                    company_id,
                    doc_id,
                    date,
                    extra
                },
                success: function (data) {
                    Swal.fire({
                        html: "Успешно креиран документ!",
                        confirmButtonColor: '#198754'
                    })
                    console.log(data)
                    // $('#invoiced_full').empty()
                }
            })

        })
        $(document).on('click', '#confirm_product', function () {
            let ddv = $('#ddv_check').prop("checked") == true ? 1 : 0;
            let product_id = $('#product_id').val()
            let qty = $('#qty').val()
            let price = $('#price').val()
            let company_id = $('#company_name').val()

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
                success: function (data) {
                    $('#invoiced_full').empty()
                    $('#invoiced_full').append(data)
                    $("#product_name").val("");
                }
            })

        })
        $(document).on('change', '#product_name', function (e) {
            if (e.keyCode == 13) {
                e.preventDefault();
                return false;
            }
            let product = $(this).val()
            $('#product_id').val(product)
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
                success: function (data) {
                    $('#product_id').attr('disabled', true)

                }
            })

        })

        $(document).on('change', '#company_name', function (e) {
            console.log('tuka')
            if (e.keyCode == 13) {
                e.preventDefault();
                return false;
            }
            $("#datepicker").datepicker({
                dateFormat: "dd-mm-yy"
            });
            $("#datepicker").datepicker('setDate', 'today')
            let company_id = $(this).val()
            console.log('tuka    ' + company_id)
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
                success: function (company) {
                    console.log(company);
                    if (company.name == undefined) {
                        $('#open_products_panel').attr('hidden', true)
                    } else {
                        $('#company_number').val(company.id)
                        $('#open_products_panel').attr('hidden', false)
                    }
                }
            })
        })
    </script>
@endsection


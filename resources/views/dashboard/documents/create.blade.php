<div class="text-center">
    <h4>{{ $document_name }}</h4>
</div>

<div class="row">
    <label for="seller">{{ $document_id == 3 ? 'ОД:' : 'ДО:' }}</label>
    <div class="col-1">
        <input id="company_id" data-document="{{ $document_id }}" type="text" name="company_id" class="form-control"
            value="">
    </div>
    <div class="col-6">
        <input id="company_name" type="text" name="company_name" class="form-control" value="" disabled>
    </div>
    <label for="date">Датум:</label>
    <div class="col-2">
        <input type="input" id="datepicker" name="date" class="form-control">
    </div>
</div>
<div class="mt-2" id="open_products_panel" hidden>
    <div class="form-group">
        <div class="row input-group">
            <label for="product">Продукт</label>
        </div>
        <div class="row input-group">
            <div class="col-1">
                <input type="text" name="product" id="product_id" class="form-control products">
            </div>
            <input type='text' id='product_name' name="product_name" class='form-control products'>
            <div class="col-1">
                <input type="number" id="qty" class="form-control products" placeholder="Количина">
            </div>
            <div class="col-2">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <input type="checkbox" aria-label="Checkbox for following text input">
                      </div>
                    </div>
                    <input type="text" disabled placeholder="ДДВ" class="form-control">
                  </div>
            </div>
            <input type="number" id="price" class="form-control products" placeholder="Цена со ДДВ">
            <button type="button" id="confirm_product" class="btn btn-success"><i class="fas fa-check"></i></button>
        </div>
    </div>
    {{-- render invoice_preview.blade --}}
    <div id="invoiced_full"></div>
</div>

<script>



</script>

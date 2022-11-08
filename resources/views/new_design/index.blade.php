@extends('new_design.layouts.app')
@section('content')
<livewire:home-products/>

@endsection

@section('js')
    <script>
        window.addEventListener('showProduct', event => {
            $('#product_modal').modal('show');
        })
    </script>
@endsection


  @foreach ($products as $product)
      <tr>
          <th scope="row">{{ $product->id }}</th>
          <td>{{ $product->category->name }}</td>
          <td>{{ $product->name }}</td>
          <td>{{ $product->stock }}</td>
          <td>{{ number_format($product->price, 2, ',', '.') }} ден</td>
          <td>{{ number_format($product->cost_price, 2, ',', '.') }} ден</td>
          <td><a href="{{ route('edit.product', $product->id) }}" class="btn btn-secondary">Измени</a> </td>
          {{-- <td><img src="{{ asset('storage/products' . '/' . $product->image) }}"
                  style="max-height: 80px; max-width: 80px;" alt="hello"></td> --}}
          <td><button class="btn btn-warning img-open"
                  data-image="{{ asset('storage/products' . '/' . $product->image) }}" data-product="{{ $product->name }}"><i
                      class="fas fa-eye"></i></button></td>
          <td>
              <input class="toggle" type="checkbox" {{ $product->active ? 'checked' : '' }}
                  data-toggle="toggle" data-on="ДА" data-off="НЕ" data-onstyle="success" data-offstyle="danger"
                  data-id="{{ $product->id }}">
          </td>
      </tr>
  @endforeach


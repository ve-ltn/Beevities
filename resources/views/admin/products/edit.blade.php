<form method="POST" action="{{ route('admin.products.update', $product->id) }}" enctype="multipart/form-data">
    @csrf
    <input type="text" name="name" value="{{ $product->name }}" required>
    <input type="number" name="price" value="{{ $product->price }}" required>
    <input type="number" name="stock" value="{{ $product->stock }}" required>
    <select name="category_id" required>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    <input type="file" name="image">
    <button type="submit">Update</button>
</form>

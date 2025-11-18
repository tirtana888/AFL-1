// show
public function show($id)
{
    $product = Product::findOrFail($id);
    return view('products.show', compact('product'));
}

// edit
public function edit($id)
{
    $product = Product::findOrFail($id);
    return view('products.edit', compact('product'));
}

// update (POST /products/update/{id})
public function update(Request $request, $id)
{
    $data = $request->validate([
        'name'=>'required|string|max:255',
        'description'=>'nullable|string',
        'price'=>'required|numeric|min:0'
    ]);

    $product = Product::findOrFail($id);
    $product->update($data);

    return redirect()->route('products.show', ['id'=>$product->id]);
}


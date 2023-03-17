@extends('backend.master')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h4 class="ml-3">Brand Create Form</h4>
                    </div>

                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('store.product') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="border border-3 p-4 rounded">


                                            <div class="mb-3">
                                                <label for="inputProductTitle" class="form-label">Product Name</label>
                                                <input type="text" name="product_name" class="form-control"
                                                    id="inputProductTitle" placeholder="Enter product title">
                                            </div>

                                            <div class="mb-3">
                                                <label for="inputProductTitle" class="form-label">Product Tags</label>
                                                <input type="text" name="product_tags"
                                                    class="form-control visually-hidden" data-role="tagsinput">
                                            </div>

                                            <div class="mb-3">
                                                <label for="inputProductTitle" class="form-label">Product Size</label>
                                                <input type="text" name="product_size"
                                                    class="form-control visually-hidden" data-role="tagsinput">
                                            </div>

                                            <div class="mb-3">
                                                <label for="inputProductTitle" class="form-label">Product Color</label>
                                                <input type="text" name="product_color"
                                                    class="form-control visually-hidden" data-role="tagsinput">
                                            </div>



                                            <div class="mb-3">
                                                <label for="inputProductDescription" class="form-label">Short
                                                    Description</label>
                                                <textarea name="short_descp" class="form-control" id="inputProductDescription" rows="3"></textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label for="inputProductDescription" class="form-label">Long
                                                    Description</label>
                                                <textarea id="mytextarea" class="form-control" rows="6" name="long_descp"></textarea>
                                            </div>



                                            <div class="mb-3">
                                                <label for="inputProductTitle" class="form-label">Main Thambnail</label>
                                                <input name="product_thambnail" class="form-control" type="file"
                                                    id="formFile">
                                            </div>



                                            <div class="mb-3">
                                                <label for="inputProductTitle" class="form-label">Multiple Image</label>
                                                <input class="form-control" name="multi_img[]" type="file"
                                                    id="formFileMultiple" multiple="">
                                            </div>



                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="border border-3 p-4 rounded">
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label for="inputPrice" class="form-label">Price</label>
                                                    <input name="price" type="email" class="form-control"
                                                        id="inputPrice" placeholder="00.00">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="inputCompareatprice" class="form-label">Compare at
                                                        Price</label>
                                                    <input name="compare_price" type="password" class="form-control"
                                                        id="inputCompareatprice" placeholder="00.00">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="inputCostPerPrice" class="form-label">Cost Per Price</label>
                                                    <input name="per_cost" type="email" class="form-control"
                                                        id="inputCostPerPrice" placeholder="00.00">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="inputStarPoints" class="form-label">Star Points</label>
                                                    <input name="star" type="password" class="form-control"
                                                        id="inputStarPoints" placeholder="00.00">
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputProductType" class="form-label">Product Type</label>
                                                    <select name="type" class="form-control" id="inputProductType">
                                                        <option></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputVendor" class="form-label">Vendor</label>
                                                    <select name="vendor" class="form-control" id="inputVendor">
                                                        <option></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputCollection" class="form-label">Collection</label>
                                                    <select name="collection" class="form-control" id="inputCollection">
                                                        <option></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputProductTags" class="form-label">Product Tags</label>
                                                    <input name="tag" type="text" class="form-control"
                                                        id="inputProductTags" placeholder="Enter Product Tags">
                                                </div>
                                                <div class="col-12 mt-3">
                                                    <div class="d-grid">
                                                        <button type="submit" class="btn btn-primary">Save
                                                            Product</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

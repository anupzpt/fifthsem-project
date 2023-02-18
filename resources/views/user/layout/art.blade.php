 <section class="design" id="design">
                <div class="container">
                    <div class="title">
                        <h1>Arts & Designs</h1>
                        <div class="line"></div>
                        <!-- made change here  -->
                        <div class="toggler-and-category bg-brown text-white flex" style="margin-left: 40%; margin-top: 1%">
                            <div class="category-list">
                                <span>Category</span>
                                <button type="button" class="btn category-toggler-btn text-white">
                                    <i class="fas fa-circle-arrow-down"></i>
                                </button>
                            </div>
                            <ul id="category-list-items" class="bg-white" style="z-index: 1" class="bg-white">
                            
                                {{-- <li><a href="#">All</a></li>
                                <li><a href="#">NIghtstands</a></li>
                                <li><a href="#">Dressers</a></li>
                                <li><a href="#">Bookcase</a></li>
                                <li><a href="#">Coffee Tables</a></li>
                                <li><a href="#">Mattresses</a></li>
                                <li><a href="#">Sofas</a></li>
                                <li><a href="#">Chairs</a></li>
                                <li><a href="#">Hall Trees</a></li>
                                <li><a href="#">Furniture Stores</a></li> --}}
                            </ul>
                        </div>
                    </div>

                    <div class="design-content">
                        @foreach ($products  as $product)
                        <!-- item -->
                        <div class="design-item">
                            <div class="design-img">
                                <img src="{{asset('/uploads'.'/'.$product->image)}}" alt="" />
                            </div>
                            <div class="text-center">
                                <p class="text-capitalize mt-3 mb-1">{{$product->name}}</p>
                                <span class="fw-bold d-block">RS.{{$product->price}}</span>
                                <a href="#" class="button btn-primary mt-3">Add to Cart</a>
                                <a href="#" class="button btn-primary mt-3 ml-2">Buy it Now</a>
                            </div>
                        </div>
                        <!-- end of item -->
                        @endforeach

                    </div>
                </div>
            </section>

<ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a href="#product-tab-description" class="nav-link active">Description</a>
        </li>
        <li class="nav-item">
            <a href="#product-tab-reviews" class="nav-link">Customer Reviews ({{$reviews->data->reviewSummary->reviews}})</a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="product-tab-description">
            <div class="row mb-4" style="margin-left: 10px;">
            <?php echo $items->data->customFields->long_description;?>
            <!--
                <div class="col-md-6 mb-5">
                    <h4 class="title tab-pane-title font-weight-bold mb-2">Detail</h4>
                    <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt arcu cursus vitae congue mauris.
                        Sagittis id consectetur purus ut. Tellus rutrum tellus pelle Vel
                        pretium lectus quam id leo in vitae turpis massa.</p>
                    <ul class="list-type-check">
                        <li>Nunc nec porttitor turpis. In eu risus enim. In vitae mollis
                            elit.
                        </li>
                        <li>Vivamus finibus vel mauris ut vehicula.</li>
                        <li>Nullam a magna porttitor, dictum risus nec, faucibus sapien.
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 mb-5">
                    <div class="banner banner-video product-video br-xs">
                        <figure class="banner-media">
                            <a href="#">
                                <img src="/assets/images/products/video-banner-610x300.jpg"
                                    alt="banner" width="610" height="300"
                                    style="background-color: #bebebe;">
                            </a>
                            <a class="btn-play-video btn-iframe"
                                href="assets/video/memory-of-a-woman.mp4"></a>
                        </figure>
                    </div>
                </div>
                -->
            </div>
            <div class="row cols-md-3">
                <div class="mb-3">
                    <h5 class="sub-title font-weight-bold"><span class="mr-3">1.</span>Free
                        Shipping &amp; Return</h5>
                    <p class="detail pl-5">We offer free shipping for products on orders
                        above 50$ and offer free delivery for all orders in US.</p>
                </div>
                <div class="mb-3">
                    <h5 class="sub-title font-weight-bold"><span>2.</span>Free and Easy
                        Returns</h5>
                    <p class="detail pl-5">We guarantee our products and you could get back
                        all of your money anytime you want in 30 days.</p>
                </div>
                <div class="mb-3">
                    <h5 class="sub-title font-weight-bold"><span>3.</span>Special Financing
                    </h5>
                    <p class="detail pl-5">Get 20%-50% off items over 50$ for a month or
                        over 250$ for a year with our special credit card.</p>
                </div>
            </div>
        </div>
        <!--
        <div class="tab-pane" id="product-tab-specification">
            <ul class="list-none">
                <li>
                    <label>Model</label>
                    <p>Skysuite 320</p>
                </li>
                <li>
                    <label>Color</label>
                    <p>Black</p>
                </li>
                <li>
                    <label>Size</label>
                    <p>Large, Small</p>
                </li>
                <li>
                    <label>Guarantee Time</label>
                    <p>3 Months</p>
                </li>
            </ul>
        </div>
        
        <div class="tab-pane" id="product-tab-vendor">
            <div class="row mb-3">
                <div class="col-md-6 mb-4">
                    <figure class="vendor-banner br-sm">
                        <img src="/assets/images/products/vendor-banner.jpg"
                            alt="Vendor Banner" width="610" height="295"
                            style="background-color: #353B55;" />
                    </figure>
                </div>
                <div class="col-md-6 pl-2 pl-md-6 mb-4">
                    <div class="vendor-user">
                        <figure class="vendor-logo mr-4">
                            <a href="#">
                                <img src="/assets/images/products/vendor-logo.jpg"
                                    alt="Vendor Logo" width="80" height="80" />
                            </a>
                        </figure>
                        <div>
                            <div class="vendor-name"><a href="#">Jone Doe</a></div>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 90%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="#" class="rating-reviews">(32 Reviews)</a>
                            </div>
                        </div>
                    </div>
                    <ul class="vendor-info list-style-none">
                        <li class="store-name">
                            <label>Store Name:</label>
                            <span class="detail">OAIO Store</span>
                        </li>
                        <li class="store-address">
                            <label>Address:</label>
                            <span class="detail">Steven Street, El Carjon, CA 92020, United
                                States (US)</span>
                        </li>
                        <li class="store-phone">
                            <label>Phone:</label>
                            <a href="#tel:">1234567890</a>
                        </li>
                    </ul>
                    <a href="vendor-dokan-store.html"
                        class="btn btn-dark btn-link btn-underline btn-icon-right">Visit
                        Store<i class="w-icon-long-arrow-right"></i></a>
                </div>
            </div>
            <p class="mb-5"><strong class="text-dark">L</strong>orem ipsum dolor sit amet,
                consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua.
                Venenatis tellus in metus vulputate eu scelerisque felis. Vel pretium
                lectus quam id leo in vitae turpis massa. Nunc id cursus metus aliquam.
                Libero id faucibus nisl tincidunt eget. Aliquam id diam maecenas ultricies
                mi eget mauris. Volutpat ac tincidunt vitae semper quis lectus. Vestibulum
                mattis ullamcorper velit sed. A arcu cursus vitae congue mauris.
            </p>
            <p class="mb-2"><strong class="text-dark">A</strong> arcu cursus vitae congue
                mauris. Sagittis id consectetur purus
                ut. Tellus rutrum tellus pellentesque eu tincidunt tortor aliquam nulla.
                Diam in
                arcu cursus euismod quis. Eget sit amet tellus cras adipiscing enim eu. In
                fermentum et sollicitudin ac orci phasellus. A condimentum vitae sapien
                pellentesque
                habitant morbi tristique senectus et. In dictum non consectetur a erat. Nunc
                scelerisque viverra mauris in aliquam sem fringilla.</p>
        </div>
        -->
        <div class="tab-pane" id="product-tab-reviews">
            <div class="row mb-4">
                <div class="col-xl-4 col-lg-5 mb-4">
                    <div class="ratings-wrapper">
                        <div class="avg-rating-container">
                            <h4 class="avg-mark font-weight-bolder ls-50">{{$reviews->data->reviewSummary->rating}}</h4>
                            <div class="avg-rating">
                                <p class="text-dark mb-1">Average Rating</p>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 60%;"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="#" class="rating-reviews">({{$reviews->data->reviewSummary->reviews}} Reviews)</a>
                                </div>
                            </div>
                        </div>
                        <!--
                        <div
                            class="ratings-value d-flex align-items-center text-dark ls-25">
                            <span
                                class="text-dark font-weight-bold">66.7%</span>Recommended<span
                                class="count">(2 of 3)</span>
                        </div>
                        -->
                        <div class="ratings-list">
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 100%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <div class="progress-bar progress-bar-sm ">
                                    <span></span>
                                </div>
                                <div class="progress-value">
                                    <mark>{{$reviews->data->reviewSummary->fiveStar}}%</mark>
                                </div>
                            </div>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 80%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <div class="progress-bar progress-bar-sm ">
                                    <span></span>
                                </div>
                                <div class="progress-value">
                                    <mark>{{$reviews->data->reviewSummary->fourStar}}%</mark>
                                </div>
                            </div>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 60%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <div class="progress-bar progress-bar-sm ">
                                    <span></span>
                                </div>
                                <div class="progress-value">
                                    <mark>{{$reviews->data->reviewSummary->threeStar}}%</mark>
                                </div>
                            </div>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 40%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <div class="progress-bar progress-bar-sm ">
                                    <span></span>
                                </div>
                                <div class="progress-value">
                                    <mark>{{$reviews->data->reviewSummary->twoStar}}%</mark>
                                </div>
                            </div>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 20%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <div class="progress-bar progress-bar-sm ">
                                    <span></span>
                                </div>
                                <div class="progress-value">
                                    <mark>{{$reviews->data->reviewSummary->oneStar}}%</mark>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-7 mb-4">
                    <div class="review-form-wrapper">
                        <h3 class="title tab-pane-title font-weight-bold mb-1">Submit Your
                            Review</h3>
                        <p class="mb-3">Your email address will not be published. Required
                            fields are marked *</p>
                            <div class="rating-wrap">
                                <div class="rating-form">
                                    <label for="rating">Your Rating Of This Product :</label>
                                    <span class="rating-stars">
                                        <a class="star-1" href="#">1</a>
                                        <a class="star-2" href="#">2</a>
                                        <a class="star-3" href="#">3</a>
                                        <a class="star-4" href="#">4</a>
                                        <a class="star-5" href="#">5</a>
                                    </span>
                                    <select class="star-rating" name="rating" id="rating" required
                                        style="display: none;">
                                        <option value="">Rate…</option>
                                        <option value="5">Perfect</option>
                                        <option value="4">Good</option>
                                        <option value="3">Average</option>
                                        <option value="2">Not that bad</option>
                                        <option value="1">Very poor</option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden"  name="product" value="{{$items->data->id}}">
                            <textarea cols="30" rows="6"
                                placeholder="Write Your Review Here..." required class="form-control"
                                id="review" name="review"></textarea>
                            <div class="row gutter-md">
                                <div class="col-md-6">
                                    <input type="text" class="form-control"
                                        placeholder="Your Name" required id="author" name="author">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control laxEmail"
                                        placeholder="Your Email" required id="email_1" name="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" class="custom-checkbox"
                                    id="save-checkbox">
                                <label for="save-checkbox">Save my name, email, and website
                                    in this browser for the next time I comment.</label>
                            </div>
                            <button type="submit" class="btn btn-dark">Submit Review</button>
                    </div>
                </div>
            </div>

            <div class="tab tab-nav-boxed tab-nav-outline tab-nav-center">
                <!--
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="#show-all" class="nav-link active">Show All</a>
                    </li>
                    <li class="nav-item">
                        <a href="#helpful-positive" class="nav-link">Most Helpful
                            Positive</a>
                    </li>
                    <li class="nav-item">
                        <a href="#helpful-negative" class="nav-link">Most Helpful
                            Negative</a>
                    </li>
                    <li class="nav-item">
                        <a href="#highest-rating" class="nav-link">Highest Rating</a>
                    </li>
                    <li class="nav-item">
                        <a href="#lowest-rating" class="nav-link">Lowest Rating</a>
                    </li>
                </ul>
                -->
                <div class="tab-content">
                    <div class="tab-pane active" id="show-all">
                        <ul class="comments list-style-none">
                            @foreach($reviews->data->reviews as $review)
                            <li class="comment">
                                <div class="comment-body">
                                    <figure class="comment-avatar">
                                        <img src="{{$review->avatar}}"
                                            alt="Commenter Avatar" width="90" height="90">
                                    </figure>
                                    <div class="comment-content">
                                        <h4 class="comment-author">
                                            <a href="#">{{$review->author}}</a>
                                            <span class="comment-date">{{$review->date}}</span>
                                        </h4>
                                        <div class="ratings-container comment-rating">
                                            <div class="ratings-full">
                                                <span class="ratings"
                                                    style="width: {{$review->rating * 20}}%;"></span>
                                                <span
                                                    class="tooltiptext tooltip-top"></span>
                                            </div>
                                        </div>
                                        <p>{{$review->text}}</p>
                                        <!--
                                        <div class="comment-action">
                                            <a href="#"
                                                class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                <i class="far fa-thumbs-up"></i>Helpful (1)
                                            </a>
                                            <a href="#"
                                                class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                <i class="far fa-thumbs-down"></i>Unhelpful
                                                (0)
                                            </a>
                                            <div class="review-image">
                                                <a href="#">
                                                    <figure>
                                                        <img src="/assets/images/products/default/review-img-1.jpg"
                                                            width="60" height="60"
                                                            alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                            data-zoom-image="/assets/images/products/default/review-img-1-800x900.jpg" />
                                                    </figure>
                                                </a>
                                            </div>
                                        </div>
                                        -->
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>



    
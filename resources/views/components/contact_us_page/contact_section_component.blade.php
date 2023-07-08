<section class="contact-section">
    <div class="row gutter-lg pb-3">
        <div class="col-lg-6 mb-8">
            <h4 class="title mb-3">People usually ask these</h4>
            <div class="accordion accordion-bg accordion-gutter-md accordion-border">
                <div class="card">
                    <div class="card-header">
                        <a href="#collapse1" class="collapse">How long will it take to deliver my order?</a>
                    </div>
                    <div id="collapse1" class="card-body expanded">
                        <p class="mb-0">
                        Delivery time may differ upon the delivery location of your order. It will take 1-2 days for 
                        orders within Colombo City Limits and 1-3 days for orders within suburbs and for outstation orders it 
                        will take 2-5 days. This time may differ upon various circumstances.
                        </p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <a href="#collapse2" class="expand">How my order is Delivered?</a>
                    </div>
                    <div id="collapse2" class="card-body collapsed">
                        <p class="mb-0">
                            Your order is delivered through one of our delivery partners, which is a local courier company.
                        </p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <a href="#collapse3" class="expand">If my order is late, what should I do?</a>
                    </div>
                    <div id="collapse3" class="card-body collapsed">
                        <p class="mb-0">
                        If the delivery of your order being delayed, please contact us through our hotline: 0114225990 
                        and we are happy to help you to get your order delivered fast.
                        </p>
                    </div>
                </div>

                <a type="button" href="/faq" class="btn btn-dark btn-rounded" style="margin-top:37px;">Read More</a>

            </div>
        </div>
        <div class="col-lg-6 mb-8">
            <h4 class="title mb-3">Send Us a Message</h4>
            <form class="form contact-us-form" action="/contact-form" method="POST" id="contact-form">
                @csrf
                <div class="form-group">
                    <label for="name">Your Name *</label>
                    <input type="text" id="name" name="name" required
                        class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Your Email *</label>
                    <input type="email" id="email" name="email" required
                        class="form-control laxEmail">
                </div>
                <div class="form-group">
                    <label for="message">Your Message *</label>
                    <textarea id="message" name="bodyText" cols="30" rows="5" required
                        class="form-control"></textarea>
                </div>
                <div class="form-group mb-3">
                    <div class="g-recaptcha" data-sitekey="6LdTPy4iAAAAANP0tmskty75ZHbVAMI3JDkwlRuf"></div>
                    <input type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha" id="hiddenRecaptcha">
                </div>
                <button type="submit" class="btn btn-dark btn-rounded">Send Now</button>
            </form>
        </div>
    </div>
</section>

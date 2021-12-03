<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
    <!--Site Title-->
    <title>Rightway Future</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css"
        href="//fonts.googleapis.com/css?family=Pacifico%7CLato:400,100,100italic,300,300italic,700,400italic,900,700italic,900italic%7CMontserrat:400,700">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
    .ie-panel {
        display: none;
        background: #212121;
        padding: 10px 0;
        box-shadow: 3px 3px 5px 0 rgba(0, 0, 0, .3);
        clear: both;
        text-align: center;
        position: relative;
        z-index: 1;
    }

    html.ie-10 .ie-panel,
    html.lt-ie-10 .ie-panel {
        display: block;
    }
    </style>
</head>

<body>
    <div class="ie-panel"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img
                src="images/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820"
                alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a>
    </div>
    <div class="preloader">
        <div class="preloader-body">
            <div class="cssload-container">
                <div class="cssload-speeding-wheel"></div>
            </div>
            <p>Loading...</p>
        </div>
    </div>
    <!--The Main Wrapper-->
    <div class="page">
        @include('admin.internal_header')


        <section class="section section-sm section-border">
            <div class="container">
                <div class="row justify-content-center">
                    <h2 class="fw-bold text-center">Some of Your Questions</h2>
                    <hr class="short bg-accent">
                    <div class="row">
                        <div class="col-12">
                            <!-- Bootstrap collapse-->
                            <div class="card-group-custom card-group-corporate" id="accordion1" role="tablist"
                                aria-multiselectable="false">
                                <!-- Bootstrap card-->
                                <article class="accordion-custom accordion-custom-corporate">
                                    <div class="accordion-custom-header" id="accordion1Heading1" role="tab">
                                        <div class="accordion-custom-title"><a role="button" data-bs-toggle="collapse"
                                                data-bs-parent="#accordion1" href="#accordion1Collapse1"
                                                aria-controls="accordion1Collapse1" aria-expanded="true">What is MLM?
                                                <div class="accordion-custom-arrow"></div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="collapse show" id="accordion1Collapse1" data-bs-parent="#accordion1"
                                        role="tabpanel" aria-labelledby="accordion1Heading1">
                                        <div class="accordion-custom-body">
                                            <p>The MLM stands for multilevel marketing. It is a business model where the
                                                company finds an agent to sell their product to end consumers and the
                                                agents earn the commission based on the private sale and they also
                                                enroll new members or downlines to the business and new people, in turn,
                                                enroll another downline and it goes like a chain process. The agents
                                                also earn the commission for the indirect sale that happened through
                                                their agents.</p>
                                        </div>
                                    </div>
                                </article>
                                <!-- Bootstrap card-->
                                <article class="accordion-custom accordion-custom-corporate">
                                    <div class="accordion-custom-header" id="accordion1Heading2" role="tab">
                                        <div class="accordion-custom-title"><a class="collapsed" role="button"
                                                data-bs-toggle="collapse" data-bs-parent="#accordion1"
                                                href="#accordion1Collapse2" aria-controls="accordion1Collapse2">How to
                                                start a part-time MLM business?
                                                <div class="accordion-custom-arrow"></div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="collapse" id="accordion1Collapse2" data-bs-parent="#accordion1"
                                        role="tabpanel" aria-labelledby="accordion1Heading2">
                                        <div class="accordion-custom-body">
                                            <p>A good number of people began part-time MLM jobs when they have a
                                                full-time job in their hands. Use one or two hours per day after your
                                                daily work to promote the business through your friends or family and it
                                                will guarantee you a second income.
                                            </p>
                                        </div>
                                    </div>
                                </article>
                                <!-- Bootstrap card-->
                                <article class="accordion-custom accordion-custom-corporate">
                                    <div class="accordion-custom-header" id="accordion1Heading3" role="tab">
                                        <div class="accordion-custom-title"><a class="collapsed" role="button"
                                                data-bs-toggle="collapse" data-bs-parent="#accordion1"
                                                href="#accordion1Collapse3" aria-controls="accordion1Collapse3">How to
                                                make money through MLM business?
                                                <div class="accordion-custom-arrow"></div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="collapse" id="accordion1Collapse3" data-bs-parent="#accordion1"
                                        role="tabpanel" aria-labelledby="accordion1Heading3">
                                        <div class="accordion-custom-body">
                                            <p>You can earn an enough amount when any private sale is done and you also
                                                earn a commission when any sale is done through your downline or team
                                                members. The commission percentage depends upon the plan followed by the
                                                company.</p>
                                        </div>
                                    </div>
                                </article>
                                <!-- Bootstrap card-->
                                <article class="accordion-custom accordion-custom-corporate">
                                    <div class="accordion-custom-header" id="accordion1Heading4" role="tab">
                                        <div class="accordion-custom-title"><a class="collapsed" role="button"
                                                data-bs-toggle="collapse" data-bs-parent="#accordion1"
                                                href="#accordion1Collapse4" aria-controls="accordion1Collapse4">How to
                                                recruit new members in the MLM business?
                                                <div class="accordion-custom-arrow"></div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="collapse" id="accordion1Collapse4" data-bs-parent="#accordion1"
                                        role="tabpanel" aria-labelledby="accordion1Heading4">
                                        <div class="accordion-custom-body">
                                            <p>In MLM marketing, you can enroll new members either from family or
                                                friends by describing the product and the business. You can describe the
                                                advantages of the business by using the company manual, short videos
                                                etc.</p>
                                        </div>
                                    </div>
                                </article>
                                <!-- Bootstrap card-->
                                <article class="accordion-custom accordion-custom-corporate">
                                    <div class="accordion-custom-header" id="accordion1Heading5" role="tab">
                                        <div class="accordion-custom-title"><a class="collapsed" role="button"
                                                data-bs-toggle="collapse" data-bs-parent="#accordion1"
                                                href="#accordion1Collapse5" aria-controls="accordion1Collapse5">What
                                                type of products are used for this business?
                                                <div class="accordion-custom-arrow"></div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="collapse" id="accordion1Collapse5" data-bs-parent="#accordion1"
                                        role="tabpanel" aria-labelledby="accordion1Heading5">
                                        <div class="accordion-custom-body">
                                            <p>MLM marketing essentially concentrates on the products which are
                                                consumable. Consumable products include healthcare, beauty products,
                                                nutritional products etc. These types of products will be used by the
                                                consumers or sellers so they come up with a new deal for the product.
                                            </p>
                                        </div>
                                    </div>
                                </article>
                                <!-- Bootstrap card-->
                                <article class="accordion-custom accordion-custom-corporate">
                                    <div class="accordion-custom-header" id="accordion1Heading6" role="tab">
                                        <div class="accordion-custom-title"><a class="collapsed" role="button"
                                                data-bs-toggle="collapse" data-bs-parent="#accordion1"
                                                href="#accordion1Collapse6" aria-controls="accordion1Collapse6">How to
                                                promote the MLM products in network marketing?
                                                <div class="accordion-custom-arrow"></div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="collapse" id="accordion1Collapse6" data-bs-parent="#accordion1"
                                        role="tabpanel" aria-labelledby="accordion1Heading6">
                                        <div class="accordion-custom-body">
                                            <p>As an MLM publisher, to sell MLM products, you can stay in touch with
                                                your downlines, family, friends, etc. Keep regular meetings with your
                                                downlines to sell the MLM products, send e-mails to the consumers in
                                                contact, create a social media group to support the MLM product, conduct
                                                a party or seminar to present your product demo and MLM presentation.
                                            </p>
                                        </div>
                                    </div>

                                </article>
                                <!-- Bootstrap card-->
                                <article class="accordion-custom accordion-custom-corporate">
                                    <div class="accordion-custom-header" id="accordion1Heading7" role="tab">
                                        <div class="accordion-custom-title"><a class="collapsed" role="button"
                                                data-bs-toggle="collapse" data-bs-parent="#accordion1"
                                                href="#accordion1Collapse7" aria-controls="accordion1Collapse7">Is MLM
                                                an illegal business?
                                                <div class="accordion-custom-arrow"></div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="collapse" id="accordion1Collapse7" data-bs-parent="#accordion1"
                                        role="tabpanel" aria-labelledby="accordion1Heading7">
                                        <div class="accordion-custom-body">
                                            <p>There is a general misinterpretation that pyramid formations are illegal.
                                                It is not the formation, only the pyramid systems are illegal. Almost
                                                all organizations follow a pyramid formation. The top person CEO
                                                supervises middle management. Middle management, in turn, supervises the
                                                employed employees. Look into the company and schemes, not into the
                                                structure. MLM business is a legal concern.</p>
                                        </div>
                                    </div>
                                </article>
                                <!-- Bootstrap card-->
                                <article class="accordion-custom accordion-custom-corporate">
                                    <div class="accordion-custom-header" id="accordion1Heading8" role="tab">
                                        <div class="accordion-custom-title"><a class="collapsed" role="button"
                                                data-bs-toggle="collapse" data-bs-parent="#accordion1"
                                                href="#accordion1Collapse8" aria-controls="accordion1Collapse8">Is this
                                                business a scam?
                                                <div class="accordion-custom-arrow"></div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="collapse" id="accordion1Collapse8" data-bs-parent="#accordion1"
                                        role="tabpanel" aria-labelledby="accordion1Heading8">
                                        <div class="accordion-custom-body">
                                            <p>Since MLM business is a legal concern, there is no chance for a scam to
                                                occur. Some distributors enter this industry to make money within a
                                                short period of time without wasting their efforts and they go out of
                                                this business and spread that this business is a scam. You can make
                                                money in any business within 30 to 90 days if you genuinely invest your
                                                efforts.</p>
                                        </div>
                                    </div>
                                </article>
                                <!-- Bootstrap card-->
                                <article class="accordion-custom accordion-custom-corporate">
                                    <div class="accordion-custom-header" id="accordion1Heading9" role="tab">
                                        <div class="accordion-custom-title"><a class="collapsed" role="button"
                                                data-bs-toggle="collapse" data-bs-parent="#accordion1"
                                                href="#accordion1Collapse9" aria-controls="accordion1Collapse9">What is
                                                the success rate?
                                                <div class="accordion-custom-arrow"></div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="collapse" id="accordion1Collapse9" data-bs-parent="#accordion1"
                                        role="tabpanel" aria-labelledby="accordion1Heading9">
                                        <div class="accordion-custom-body">
                                            <p>The success rate of any industry depends upon your constant effort and
                                                time. Similarly, it is the same MLM industry. If you really invest time
                                                and effort you can also earn a 6 to 7 figure income in this business.
                                                Success depends upon the self. Success or failure depends upon the
                                                intention of the members. Some people join only for the commission. Some
                                                people see it as a second income and will try to sell the product and
                                                earn great commission.</p>
                                        </div>
                                    </div>
                                </article>
                                <!-- Bootstrap card-->
                                <article class="accordion-custom accordion-custom-corporate">
                                    <div class="accordion-custom-header" id="accordion1Heading10" role="tab">
                                        <div class="accordion-custom-title"><a class="collapsed" role="button"
                                                data-bs-toggle="collapse" data-bs-parent="#accordion1"
                                                href="#accordion1Collapse10" aria-controls="accordion1Collapse10">Can I
                                                build multiple businesses concurrently?
                                                <div class="accordion-custom-arrow"></div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="collapse" id="accordion1Collapse10" data-bs-parent="#accordion1"
                                        role="tabpanel" aria-labelledby="accordion1Heading10">
                                        <div class="accordion-custom-body">
                                            <p>Some companies support you to do multiple businesses at the same time.
                                                Some companies will have a distributor agreement that binds you to do
                                                so. It purely depends on the company. It is always better to focus your
                                                business on a single MLM company.</p>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <!--Footer-->
        @include('admin.footer')
    </div>
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!--Scripts-->
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>
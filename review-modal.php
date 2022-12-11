<!--Review Modal -->
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="js/jquery2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="main.js"></script>

    <style>
        .rating {
        display: flex;
        flex-direction: row-reverse;
        justify-content: center;
        }

        .rating > input{
        display:none;
        }

        .rating > label {
        position: relative;
        width: 1.1em;
        font-size: calc(3vw + 3vh);
        color: #FFD700;
        cursor: pointer;
        }

        .rating > label::before{
        content: "\2605";
        position: absolute;
        opacity: 0;
        }

        .rating > label:hover:before,
        .rating > label:hover ~ label:before {
        opacity: 1 !important;
        }

        .rating > input:checked ~ label:before{
        opacity:1;
        }

        .rating:hover > input:checked ~ label:before{ 
        opacity: 0.4;
        }
    </style>

</head>
<body>
    <div class="modal fade" id="review-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="icon-close"></i></span>
                    </button>

                    <div class="form-box">
                        <div class="form-tab">
                            <ul class="nav nav-pills nav-fill nav-border-anim" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="signin-tab" data-toggle="tab" role="tab" aria-controls="signin" aria-selected="true">Rate Product</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="tab-content-5">
                                <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                                    <form onsubmit="return false" id="review">
                                        <div class="form-group">
                                            <label for="rating">Product Quality:</label>
                                            <div class="rating">
                                                <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                                                <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                                                <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                                                <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                                                <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                                            </div>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="reviewText">Product Review:</label>
                                            <textarea id="reviewText" name="reviewText" rows="10" class="form-control">
                                            Share your thoughts on the product to help other buyers.
                                            </textarea>
                                        </div><!-- End .form-group -->

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2" Value="Review">
                                                <span>Submit</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>
                                        </div><!-- End .form-footer -->
                                    </form>
                                </div><!-- .End .tab-pane -->
                            </div><!-- End .tab-content -->
                        </div><!-- End .form-tab -->
                    </div><!-- End .form-box -->
                </div><!-- End .modal-body -->
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->

    </body>
</html>
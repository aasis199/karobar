<?php
include 'base.php';
?>

<div class="content-page">
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
            <?php
                    if(isset($_SESSION['msg'])){
                        echo '  <div class="alert alert-info">
                        '.$_SESSION["msg"].'
                    </div>';
                            
                            unset($_SESSION['msg']);
                    }
                ?>
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Add Return</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="page-list-returns.html" data-toggle="validator" novalidate="true">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date *</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Reference No *</label>
                                        <input type="text" class="form-control" placeholder="Enter Reference No"
                                            required="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Biller *</label>
                                        <div class="dropdown bootstrap-select form-control"><select name="type"
                                                class="selectpicker form-control" data-style="py-0">
                                                <option>Test Biller</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Customer *</label>
                                        <input type="text" class="form-control" placeholder="Enter Customer Name"
                                            required="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Order Tax *</label>
                                        <div class="dropdown bootstrap-select form-control"><select name="type"
                                                class="selectpicker form-control" data-style="py-0">
                                                <option>No Text</option>
                                                <option>GST @5%</option>
                                                <option>VAT @10%</option>
                                            </select>
                                            <div class="dropdown-menu ">
                                                <div class="inner show" role="listbox" id="bs-select-2" tabindex="-1">
                                                    <ul class="dropdown-menu inner show" role="presentation"></ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Order Discount</label>
                                        <input type="text" class="form-control" placeholder="Discount">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Shipping</label>
                                        <input type="text" class="form-control" placeholder="Shipping">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Attach Document</label>
                                        <input type="file" class="form-control image-file" name="pic" accept="image/*">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Return Note *</label>
                                        <div id="quill-tool" class="ql-toolbar ql-snow">
                                            <button class="ql-bold" data-toggle="tooltip" data-placement="bottom"
                                                title="" data-original-title="Bold" type="button"><svg
                                                    viewBox="0 0 18 18">
                                                    <path class="ql-stroke"
                                                        d="M5,4H9.5A2.5,2.5,0,0,1,12,6.5v0A2.5,2.5,0,0,1,9.5,9H5A0,0,0,0,1,5,9V4A0,0,0,0,1,5,4Z">
                                                    </path>
                                                    <path class="ql-stroke"
                                                        d="M5,9h5.5A2.5,2.5,0,0,1,13,11.5v0A2.5,2.5,0,0,1,10.5,14H5a0,0,0,0,1,0,0V9A0,0,0,0,1,5,9Z">
                                                    </path>
                                                </svg></button>
                                            <button class="ql-underline" data-toggle="tooltip" data-placement="bottom"
                                                title="" data-original-title="Underline" type="button"><svg
                                                    viewBox="0 0 18 18">
                                                    <path class="ql-stroke"
                                                        d="M5,3V9a4.012,4.012,0,0,0,4,4H9a4.012,4.012,0,0,0,4-4V3">
                                                    </path>
                                                    <rect class="ql-fill" height="1" rx="0.5" ry="0.5" width="12" x="3"
                                                        y="15"></rect>
                                                </svg></button>
                                            <button class="ql-italic" data-toggle="tooltip" data-placement="bottom"
                                                title="" data-original-title="Add italic text <cmd+i>"
                                                type="button"><svg viewBox="0 0 18 18">
                                                    <line class="ql-stroke" x1="7" x2="13" y1="4" y2="4"></line>
                                                    <line class="ql-stroke" x1="5" x2="11" y1="14" y2="14"></line>
                                                    <line class="ql-stroke" x1="8" x2="10" y1="14" y2="4"></line>
                                                </svg></button>
                                            <button class="ql-image" data-toggle="tooltip" data-placement="bottom"
                                                title="" data-original-title="Upload image" type="button"><svg
                                                    viewBox="0 0 18 18">
                                                    <rect class="ql-stroke" height="10" width="12" x="3" y="4"></rect>
                                                    <circle class="ql-fill" cx="6" cy="7" r="1"></circle>
                                                    <polyline class="ql-even ql-fill"
                                                        points="5 12 5 11 7 9 8 10 11 7 13 9 13 12 5 12"></polyline>
                                                </svg></button>
                                            <button class="ql-code-block" data-toggle="tooltip" data-placement="bottom"
                                                title="" data-original-title="Show code" type="button"><svg
                                                    viewBox="0 0 18 18">
                                                    <polyline class="ql-even ql-stroke" points="5 7 3 9 5 11">
                                                    </polyline>
                                                    <polyline class="ql-even ql-stroke" points="13 7 15 9 13 11">
                                                    </polyline>
                                                    <line class="ql-stroke" x1="10" x2="8" y1="5" y2="13"></line>
                                                </svg></button>
                                        </div>
                                        <div id="quill-toolbar" class="ql-container ql-snow">
                                            <div class="ql-editor ql-blank" data-gramm="false" contenteditable="true"
                                                data-placeholder="Compose an epic...">
                                                <p><br></p>
                                            </div>
                                            <div class="ql-clipboard" contenteditable="true" tabindex="-1"></div>
                                            <div class="ql-tooltip ql-hidden"><a class="ql-preview"
                                                    rel="noopener noreferrer" target="_blank"
                                                    href="about:blank"></a><input type="text" data-formula="e=mc^2"
                                                    data-link="https://quilljs.com" data-video="Embed URL"><a
                                                    class="ql-action"></a><a class="ql-remove"></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2 disabled">Add Returns</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page end  -->
    </div>
</div>
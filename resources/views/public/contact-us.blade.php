@extends('public.layouts.app')
@section('content')
    <!-- Start Contact Us  -->
    <div class="contact-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="contact-form-right">
                        <h2>КОНТАКТ</h2>
                        <p>  Доколку имате предлог, прашања или сте заинтересирани за деловна соработка Ве молиме да не контактирате
                            преку формата прикажана подоле.
                        </p>
                        <form id="contactForm">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Име и Презиме" required data-error="Внесете Име и Презиме">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Емаил Адреса" id="email" class="form-control" name="name" required data-error="Внесете емаил адреса">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="title" name="name" placeholder="Наслов" required data-error="Наслов">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="message" id="message" placeholder="Порака" rows="4" data-error="Внесете порака" required></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="submit-button text-center">
                                        <button class="btn hvr-hover" id="submit" type="submit">Send Message</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
				<div class="col-lg-4 col-sm-12">
                    <div class="contact-info-left">
                        <h2>МОДЕРНО МК</h2>
                        <p>Create your world!</p>
                        <ul>
                            <li>
                                <p><i class="fas fa-map-marker-alt"></i>Адреса: Ул. Петар Манџуков бр. 191 <br>1000 Скопје,<br></p>
                            </li>
                            <li>
                                <p><i class="fas fa-phone-square"></i>Телефон: <a href="">+38970662266</a></p>
                            </li>
                            <li>
                                <p><i class="fas fa-envelope"></i>Email: <a href="mailto:info@moderno.com.mk">info@moderno.com.mk</a></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

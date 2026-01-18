@extends('layouts.app')

@section('title', 'Contact Us - ShopMini')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            {{-- Header --}}
            <div class="text-center mb-5">
                <h1 class="display-4 fw-bold mb-3">
                    <i class="bi bi-envelope text-primary"></i> Contact Us
                </h1>
                <p class="lead text-muted">We'd love to hear from you</p>
            </div>

            <div class="row g-4">
                {{-- Contact Info --}}
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <h4 class="mb-4">Get in Touch</h4>
                            
                            <div class="mb-4">
                                <div class="d-flex align-items-start mb-3">
                                    <i class="bi bi-geo-alt-fill text-primary fs-4 me-3"></i>
                                    <div>
                                        <h6 class="mb-1">Address</h6>
                                        <p class="text-muted mb-0">
                                            Jl. Sudirman No. 123<br>
                                            Jakarta Pusat, 10220<br>
                                            Indonesia
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="d-flex align-items-start mb-3">
                                    <i class="bi bi-telephone-fill text-success fs-4 me-3"></i>
                                    <div>
                                        <h6 class="mb-1">Phone</h6>
                                        <p class="text-muted mb-0">
                                            +62 21 1234 5678<br>
                                            <small>Mon-Fri: 9AM - 6PM</small>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="d-flex align-items-start mb-3">
                                    <i class="bi bi-envelope-fill text-info fs-4 me-3"></i>
                                    <div>
                                        <h6 class="mb-1">Email</h6>
                                        <p class="text-muted mb-0">
                                            support@shopmini.com<br>
                                            info@shopmini.com
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <h6 class="mb-3">Follow Us</h6>
                                <div class="d-flex gap-2">
                                    <a href="#" class="btn btn-outline-primary btn-sm">
                                        <i class="bi bi-facebook"></i>
                                    </a>
                                    <a href="#" class="btn btn-outline-info btn-sm">
                                        <i class="bi bi-twitter"></i>
                                    </a>
                                    <a href="#" class="btn btn-outline-danger btn-sm">
                                        <i class="bi bi-instagram"></i>
                                    </a>
                                    <a href="#" class="btn btn-outline-success btn-sm">
                                        <i class="bi bi-whatsapp"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Contact Form --}}
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <h4 class="mb-4">Send us a Message</h4>
                            
                            <form>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="name" class="form-label">Your Name *</label>
                                        <input type="text" class="form-control" id="name" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email Address *</label>
                                        <input type="email" class="form-control" id="email" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="subject" class="form-label">Subject *</label>
                                        <input type="text" class="form-control" id="subject" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="message" class="form-label">Message *</label>
                                        <textarea class="form-control" id="message" rows="6" required></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary btn-lg">
                                            <i class="bi bi-send"></i> Send Message
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    {{-- Quick Links --}}
                    <div class="row g-3 mt-2">
                        <div class="col-md-4">
                            <div class="card border-0 bg-primary text-white">
                                <div class="card-body text-center p-4">
                                    <i class="bi bi-question-circle fs-1 mb-3"></i>
                                    <h5>FAQ</h5>
                                    <p class="small mb-3">Find quick answers</p>
                                    <a href="{{ route('faq') }}" class="btn btn-light btn-sm">View FAQ</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-0 bg-success text-white">
                                <div class="card-body text-center p-4">
                                    <i class="bi bi-headset fs-1 mb-3"></i>
                                    <h5>Live Chat</h5>
                                    <p class="small mb-3">Chat with support</p>
                                    <button class="btn btn-light btn-sm">Start Chat</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-0 bg-info text-white">
                                <div class="card-body text-center p-4">
                                    <i class="bi bi-whatsapp fs-1 mb-3"></i>
                                    <h5>WhatsApp</h5>
                                    <p class="small mb-3">Message us directly</p>
                                    <a href="https://wa.me/6281234567890" class="btn btn-light btn-sm" target="_blank">
                                        Open WhatsApp
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

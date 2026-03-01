@extends('frontend.master')

@section('content')
    <section class="donate-section py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <!-- CONTENT -->
                <div class="col-lg-6">
                    <div class="donate-content">
                        <h2 class="display-5 fw-bold mb-3">Support Our Mission</h2>
                        <p class="lead">
                            Your generous donation helps us continue empowering communities, providing education,
                            and promoting justice for all. Every contribution — big or small — brings hope and change.
                        </p>

                        <!-- BANK DETAILS -->
                        <div class="bank-details mt-4 p-4 bg-white shadow-sm rounded">
                            <h4 class="mb-3">Donate via Bank Transfer</h4>
                            <ul class="list-unstyled">
                                <li><strong>Account Name:</strong> PATH Bangladesh</li>
                                <li><strong>Account No:</strong> 20507790200076813</li>
                                <li><strong>Bank:</strong> Islami Bank Bangladesh PLC</li>
                                <li><strong>Branch:</strong> Khulna Branch</li>
                            </ul>

                            <p class="text-secondary small mt-2">
                                After your donation, please email us a screenshot of the transaction for acknowledgment.
                            </p>
                        </div>

                        <!-- OPTIONAL FORM -->
                        {{-- <div class="donate-form mt-5">
                            <h5 class="mb-3">Send Us Your Support (Optional)</h5>
                            <form action="{{ route('donation.submit') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="donorName" class="form-label">Your Name</label>
                                    <input type="text" class="form-control" id="donorName" name="name">
                                </div>
                                <div class="mb-3">
                                    <label for="donorEmail" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="donorEmail" name="email">
                                </div>
                                <div class="mb-3">
                                    <label for="donorAmount" class="form-label">Donation Amount (BDT)</label>
                                    <input type="number" class="form-control" id="donorAmount" name="amount" required>
                                </div>

                                <button type="submit" class="btn btn-primary">Submit Support Info</button>
                            </form>
                        </div> --}}
                    </div>
                </div>

                <!-- IMAGE -->
                <div class="col-lg-6 text-center">
                    <img src="{{ asset('frontend/images/donate.jpg') }}"
                         alt="Donate to PATH Bangladesh"
                         class="img-fluid rounded shadow-lg">
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('frontend.layout.app')
@section('content')

<div class="container px-0">
    <nav class="navbar navbar-light bg-white navbar-expand-xl">
        <a href="{{route('index')}}" class="navbar-brand">
            <h1 class="text-primary display-6">Fruitables</h1>
        </a>
        <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarCollapse">
            <span class="fa fa-bars text-primary"></span>
        </button>
        <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
            <div class="navbar-nav mx-auto">
                <a href="{{route('index')}}" class="nav-item nav-link active">Home</a>
                <a href="{{route('shop')}}" class="nav-item nav-link">Shop</a>

                <a href="{{route('testimonials')}}" class="nav-item nav-link">Testimonial</a>

                <a href="{{route('contacts')}} " class="nav-item nav-link">Contact</a>
            </div>
            <div class="d-flex m-3 me-0">
                <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4"
                    data-bs-toggle="modal" data-bs-target="#searchModal"><i
                        class="fas fa-search text-primary"></i></button>
                <a href="#" class="position-relative me-4 my-auto">
                    <i class="fa fa-shopping-bag fa-2x"></i>
                    <span
                        class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1"
                        style="top: -5px; left: 15px; height: 20px; min-width: 20px;">3</span>
                </a>
                <a href="#" class="position-relative me-4 my-auto">
                    <i class="fa fa-heart fa-2x"></i>
                    <span
                        class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1"
                        style="top: -5px; left: 15px; height: 20px; min-width: 20px;">3</span>
                </a>
                <a href="#" class="my-auto">
                    <i class="fas fa-user fa-2x"></i>
                </a>
            </div>
        </div>
    </nav>
</div>

<div class="container mt-5 sticky-header">
    <h2 class="text-center mb-4">My Account</h2>
    <div class="row">
        <div class="col-md-3">
            <ul class="nav flex-column nav-pills" id="myAccountTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="profile-tab" data-bs-toggle="pill" data-bs-target="#profile"
                        type="button" role="tab" aria-controls="profile" aria-selected="true">
                        <i class="bi bi-person"></i> My Profile
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="edit-profile-tab" data-bs-toggle="pill" data-bs-target="#edit-profile"
                        type="button" role="tab" aria-controls="edit-profile" aria-selected="false">
                        <i class="bi bi-pencil-square"></i> Edit Profile
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="change-password-tab" data-bs-toggle="pill"
                        data-bs-target="#change-password" type="button" role="tab" aria-controls="change-password"
                        aria-selected="false">
                        <i class="bi bi-lock"></i> Change Password
                    </button>
                </li>
            </ul>
        </div>

        <div class="col-md-9">
            <div class="tab-content" id="myAccountTabsContent">
                <!-- Profile Tab -->
                <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <form>
                        <div class="mb-3">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstName" value="{{@$users->first_name}}"
                                placeholder="Enter your first name" required>
                        </div>
                        <div class="mb-3">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastName" placeholder="Enter your last name" value="{{@$users->last_name}}"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter your email" value="{{@$users->email}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" placeholder="Enter your Phone Number" value="{{@$users->phone}}"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="City" class="form-label">City</label>
                            <input type="text" class="form-control" id="city" placeholder="Enter your city" value="{{@$users->city}}"
                                required>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>

                <!-- Edit Profile Tab -->
                <div class="tab-pane fade" id="edit-profile" role="tabpanel" aria-labelledby="edit-profile-tab">
                    <h4 class="mb-3">Edit Profile</h4>
                    <form>
                        <div class="mb-3">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstName" value="{{@$users->first_name}}"
                                placeholder="Enter your first name" required>
                        </div>
                        <div class="mb-3">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastName" placeholder="Enter your last name" value="{{@$users->last_name}}"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter your email" value="{{@$users->email}}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>

                <!-- Change Password Tab -->
                <div class="tab-pane fade" id="change-password" role="tabpanel" aria-labelledby="change-password-tab">
                    <h4 class="mb-3">Change Password</h4>
                    <form action="{{route('changepassword')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="currentPassword" class="form-label">Current Password</label>
                            <input type="password" class="form-control" id="currentPassword"
                                placeholder="Enter current password" required>
                        </div>
                        <div class="mb-3">
                            <label for="newPassword" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="newPassword"
                                placeholder="Enter new password" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirmPassword"
                                placeholder="Confirm new password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Placeholder form submission
    document.querySelectorAll("form").forEach(form => {
        form.addEventListener("submit", e => {
            e.preventDefault();
            alert("Form submitted successfully!");
        });
    });
</script>

@endsection

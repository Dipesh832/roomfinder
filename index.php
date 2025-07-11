<?php include_once __DIR__ . '/includes/header.php'; ?>
<?php include_once __DIR__ . '/includes/navbar.php'; ?>

<section class="hero-section py-5">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold text-primary">Find Your Perfect Room in Nepal</h1>
                <p class="lead mt-3">Browse listings, connect with room owners, and move in with ease.</p>

                <form action="" class="row g-2">
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Location (e.g.,Kathmandu)">
                    </div>
                    <div class="col-md-3">
                        <select name="room-type" id="room-type" class="form-control">
                            <option value="">Select Room Type</option>
                            <option value="single_room">Single Room</option>
                            <option value="flat">Flat</option>
                            <option value="shared_room">Shared Room</option>
                            <option value="double_room">Double Room</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>
<section class="py-5" id="rooms-listings">
    <div class="container">
        <h2 class="text-center fw-bold text-primary mb-4">Available Rooms</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card’s content.</p>
                        <a href="#" class="btn btn-primary">Details</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

</section>

<section id="how-it-works" class="py-5 bg-light">
    <div class="container text-center">
        <h2 class="mb-4 fw-bold text-primary">How It Works</h2>
        <p class="mb-5 text-muted">Whether you're looking for a room or listing one, RoomFinder makes it simple.</p>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="mb-3">
                            <i class="bi bi-person-plus display-4 text-primary"></i>
                        </div>
                        <h5 class="card-title">1. Sign Up</h5>
                        <p class="card-text">Register as a tenant or owner to get started with RoomFinder.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="mb-3">
                            <i class="bi bi-house-door display-4 text-success"></i>
                        </div>
                        <h5 class="card-title">2. Post or Browse Rooms</h5>
                        <p class="card-text">Owners can list rooms. Tenants can search based on location and type.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="mb-3">
                            <i class="bi bi-chat-dots display-4 text-warning"></i>
                        </div>
                        <h5 class="card-title">3. Connect & Rent</h5>
                        <p class="card-text">Contact the owner or tenant, visit the room, and finalize the deal easily.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>





<?php include_once __DIR__ . '/includes/footer.php'; ?>
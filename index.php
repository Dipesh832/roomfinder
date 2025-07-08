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
<section class="room-listing py-5">
    <div class="container">
        <h2 class="text-center text-primary mb-4">Available Rooms</h2>
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



<?php include_once __DIR__ . '/includes/footer.php'; ?>
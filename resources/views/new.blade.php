<div class="card">
    <div class="card-header">Add New Movie</div>
    <div class="card-body">
        <form method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <button class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

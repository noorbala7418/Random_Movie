<div class="card">
    <div class="card-header">
        List Of Movies
    </div>
    <div class="card-body">
        <table class="table table-hover" id="links-table">
            <thead>
            <tr>
                <th>#</th>
                <th>Movie Name</th>
                <th>Play Counter</th>
                <th>Orders</th>
            </tr>
            </thead>
            <tbody>
            @foreach($movies as $movie)
                <tr>
                    <td>{{ $movie->id }}</td>
                    <td>{{ $movie->name }}</td>
                    <td>{{ $movie->play_counter }}</td>
                    <td>
                        <form action="{{ route('remove', ['id'=>$movie->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger">Remove</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {{ $movies->links() }}
    </div>
</div>

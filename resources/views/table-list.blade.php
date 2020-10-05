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
                    <td>

                        <form action="{{ route('counter',['id'=>$movie->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-info" name="counter" value="plus">+</button>
                            <input class="form-control" value="{{ $movie->play_counter }}"
                                   style="width: 15%;display: table-row" readonly>
                            <button type="submit" class="btn btn-danger" name="counter" value="minus">-</button>
                        </form>

                    </td>
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

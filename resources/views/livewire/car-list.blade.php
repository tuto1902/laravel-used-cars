<div>
    <table>
        <tbody>
            @foreach($cars as $car)
            <tr>
                <td>{{ $car->brand->name }}</td>
                <td>{{ $car->model }}</td>
                <td>{{ $car->year }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

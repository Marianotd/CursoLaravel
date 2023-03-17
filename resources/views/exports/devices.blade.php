<table>
    <thead>
    <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>MAC</th>
        <th>IP</th>
    </tr>
    </thead>
    <tbody>
    @foreach($devices as $device)
        <tr>
            <td>{{ $device->id }}</td>
            <td>{{ $device->name }}</td>
            <td>{{ $device->description }}</td>
            <td>{{ $device->mac_address }}</td>
            <td>{{ $device->ip_address }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<h1>Dispositivos</h1>
<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Estado</th>
            <th>Número de serie</th>
            <th>Fecha de creación</th>
            <th>Fecha de actualización</th>
        </tr>
    </thead>
    <tbody class="table-border-bottom-0">
        @foreach ($devices as $device)
            <tr>
                <td>{{ $device->id }}</td>
                <td>{{ $device->name }}</td>
                <td>{{ $device->description ?? '-'}}</td>
                @if ($device->active)
                    <td>Activo</td>
                @else
                    <td>Inactivo</td>
                @endif
                <td>{{ $device->serial_number ?? '-' }}</td>
                <td>{{ $device->created_at }}</td>
                <td>{{ $device->updated_at }}</td>
            </tr>            
        @endforeach
    </tbody>
</table>
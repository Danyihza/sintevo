<table>
    <thead>
        <tr>
            <th align="center" style="background-color: darkgreen; border: 1px solid #000000;">Tanggal</th>
            <th align="center" style="background-color: darkgreen; border: 1px solid #000000;">Status</th>
            <th align="center" style="background-color: darkgreen; border: 1px solid #000000;">Uraian</th>
            <th align="center" style="background-color: darkgreen; border: 1px solid #000000;">Feedback</th>
        </tr>
    </thead>
    <tbody>
        @foreach($monev as $mon)
        <tr>
            <td align="center" style="border: 1px solid #000000;">{{ date('d/m/Y', strtotime($mon->tanggal)) }}</td>
            <td align="center" style="border: 1px solid #000000;">{{ $mon->status_progress }}</td>
            <td align="center" style="border: 1px solid #000000;">{{ $mon->uraian }}</td>
            <td align="center" style="border: 1px solid #000000;">{{ $mon->feedback ?? '-' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
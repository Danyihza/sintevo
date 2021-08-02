<table>
    <thead>
        <tr>
            <th align="center" style="background-color: darkgreen; border: 1px solid #000000;">Nomor</th>
            <th align="center" style="background-color: darkgreen; border: 1px solid #000000;">Tanggal</th>
            <th align="center" style="background-color: darkgreen; border: 1px solid #000000;">Nama Usaha</th>
            <th align="center" style="background-color: darkgreen; border: 1px solid #000000;">Pertanyaan/Feedback</th>
            <th align="center" style="background-color: darkgreen; border: 1px solid #000000;">Tanggapan</th>
        </tr>
    </thead>
    <tbody>
        @foreach($faq as $fq)
        <tr>
            <td align="center" style="border: 1px solid #000000;">{{ $loop->iteration }}</td>
            <td align="center" style="border: 1px solid #000000;">{{ date('d/m/Y', strtotime($fq->tanggal)) }}</td>
            <td align="center" style="border: 1px solid #000000;">{{ $fq->nama_usaha }}</td>
            <td align="center" style="border: 1px solid #000000;">{{ $fq->pertanyaan }}</td>
            <td align="center" style="border: 1px solid #000000;">{{ $fq->tanggapan }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<form action="" method="post">
    @csrf
    <table class="table ">
        <tr>
            <th>Room Number </th>
            <th>Action</th>
        </tr>
        @foreach ($room_number as $rooms)
            
       
        <tr>
            <td>{{$rooms->room_no}} </td>
            <td>
                <a href="{{ route('assign_room_store',[$booking->id,$rooms->id,$rooms->room_no]) }}" class="btn bg-primary"> <i class="lni lni-circle-plus lni-xl"></i></a>
            </td>
        </tr>

        @endforeach

        
    </table>
</form>
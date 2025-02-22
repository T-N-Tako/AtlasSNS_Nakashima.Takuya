<x-login-layout>

  <h2>フォロワーリスト</h2>


  <table class="table table-hover">
    @foreach($posts as $post)
    <tr>
      <td>{{ $post->user->username }}</td>
      <td>{{ $post->post }}</td>
      <td>{{ $post->created_at }}</td>
    </tr>
    @endforeach
  </table>

</x-login-layout>

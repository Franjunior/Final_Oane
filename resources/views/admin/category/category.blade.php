<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
     
            <table style="width: 100%; border: 1px solid #ddd; text-align:center;">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">CATEGORY NAME</th>
      <th scope="col">USER ID</th>
      <th scope="col">CREATED AT</th>
    </tr>
  </thead>
  <tbody>
  @php
                                    $i = 1;
                                    @endphp
  @foreach ($categories as $category)
    <tr>
    <th scope="row">{{$i++}}</th>
      <td>{{$category->category_name}}</td>
    <td>{{$category->user_id}}</td>
    <td>{{$category->created_at}}</td>

    </tr>
    @endforeach

  </tbody>
</table>


                    <div class="col-md-4">
                        <div class="card">
                            <form method="POST" action="{{ route('category') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="category_name" class="form-label">Category Name</label>
                                    <input type="text" class="form-control" name="category_name">
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
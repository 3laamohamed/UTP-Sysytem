@php
  $title = 'FAQ';
@endphp
@extends('layouts.app')
@section('content')
<div class="container">
  <h2 class="title">FAQ</h2>
      <div class="row mt-3">
        @csrf
        <div class="col-md-6 offset-md-3">
          <div class="mb-3">
            <label for="group_name" class="form-label">Question</label>
            <input type="text" class="form-control mt-3" placeholder="Write Your Question" id="question"></input>
            <label for="group_name" class="form-label mt-2">Answer</label>
            <textarea class="form-control mt-3" placeholder="Write Your Answer" id="answer" style="height: 200px"></textarea>
          </div>
          <div class="d-grid gap-2 col-6 mx-auto">
            <button class="btn btn-success clicked" id="save_copy_right" type="button">Save</button>
          </div>
        </div>
        <table class="table mt-4 text-center shadow-lg">
          <thead class="table-dark">
          <tr>
            <th>ID</th>
            <th>Question</th>
            <th>Answer</th>
            <th>Actions</th>
          </tr>
          </thead>
          <tbody class="table-light">
          @foreach($faqs as $faq)
            <tr id="{{$faq->id}}">
              <td>{{$faq->id}}</td>
              <td>{{$faq->question}}</td>
              <td>{{$faq->answer}}</td>
              <td>
                <button class="table-buttons" onclick="getRow({{$faq->id}})">
                  <ion-icon class="text-primary" name="create-outline"></ion-icon>
                </button>
                <button class="table-buttons" id='delete_client'>
                  <ion-icon class="text-danger" name="trash-outline"></ion-icon>
                </button>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
</div>
  <script>

  </script>
@stop

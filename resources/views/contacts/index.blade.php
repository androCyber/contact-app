@extends('layouts.main')

@section('title', 'Contact App | All Contacts')

@section('content')

    <!-- content -->
    <main class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-title">
                            <div class="d-flex align-items-center">
                                <h2 class="mb-0">All Contacts</h2>
                                <div class="ml-auto">
                                    <a href="{{ route('contact.create') }}" class="btn btn-success"><i
                                            class="fa fa-plus-circle"></i> Add New</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @include('contacts._filter')
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Company</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>



                                    @forelse($contacts as $id => $contact)
                                   
                                   {{-- @continue($id == 1)

                                    @break($id == 3)--}}

                                    {{--other way of continue--  }}

                                   {{-- @if ($id == 1)
                                            @continue
                                        @endif --}}

                                {{--other way of break--}}
                                       {{-- @if ($id == 3)
                                            @break
                                        @endif --}}


                                        {{--<tr @if($loop->even) class="table-primary" @endif>
                                        <tr @if($loop->last) class="table-primary" @endif>
                                        <tr @if($loop->first) class="table-primary" @endif>--}}
                                        
                                       @include('contacts._contact',['contact'=> $contact])

                                    @empty
                                        @include('contacts._empty')
                                    @endforelse

                                </tbody>
                            </table>

                            <nav class="mt-4">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection

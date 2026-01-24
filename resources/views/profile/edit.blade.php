@extends('../Frontend/layouts/app')
   @section('content')
   <hr>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h4>Update Your Profile Image</h4>
                    <br>
                    <form action="up-profile" method="post" enctype="multipart/form-data" >
                        @csrf
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <p class="text-danger text-center">{{$error}}</p>
                            @endforeach
                        @endif
                        <input type="file" name="image" class="form-control">
                        <br>
                        <x-primary-button>{{ __('Save') }}</x-primary-button>

                    </form>
                </div>
            </div>        


            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    Update Your Profile Bio
                    <br>
                    <form action="up-profile" method="post" >
                        @csrf
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <p class="text-danger text-center">{{$error}}</p>
                            @endforeach
                        @endif
                        <textarea name="bio" id="" class="form-control"></textarea>
                        <br>
                        <x-primary-button>{{ __('Save') }}</x-primary-button>

                    </form>
                </div>
            </div>

             <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    Update Your Profile Location
                    <br>
                    <form action="up-profile" method="post" >
                        @csrf
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <p class="text-danger text-center">{{$error}}</p>
                            @endforeach
                        @endif
                        <select name="location" id="" class="form-control">
                            <option value="Afghanistan">Afghanistan</option>
                            <option value="Iran">Iran</option>
                            <option value="India">India</option>
                            <option value="Pakistan">Pakistan</option>
                        </select>
                        <br>
                        <x-primary-button>{{ __('Save') }}</x-primary-button>

                    </form>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@endsection

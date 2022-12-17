
@extends('master')
@section('title', 'Cart')

@section('con')
<br>
<br>
<br>
<br>
<br>
<br>
<main class="my-8">
    <div class="container px-6 mx-auto ">
        <div class="flex justify-center my-6 ">
            <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
              @if ($message = Session::get('success'))
                  <div class="p-4 mb-3 bg-green-400 rounded">
                      <p class="text-green-800">{{ $message }}</p>
                  </div>
              @endif
                <h3 class="text-3xl text-bold "><b>Cart List </b></h3>
              <div class="flex-1">
                <table class="w-full text-sm lg:text-base" cellspacing="0">
                  <thead>
                    <tr class="h-12 uppercase">
                      <th class="hidden md:table-cell"></th>
                      <th class="text-left">Name</th>
                      <th class="pl-5 text-left lg:text-right lg:pl-0">
                        <span class="hidden lg:inline">Quantity</span>
                        <span class="lg:hidden" title="Quantity">Qtd</span>
                      </th>
                      <th class="hidden text-right md:table-cell"> Price</th>
                      <th class="hidden text-right md:table-cell"> Remove </th>
                      
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($cartItems as $item)
                    <tr>
                      <td class="hidden pb-4 md:table-cell">
                        <a href="{{ route('products.show',$item->id) }}">
                          <img src="{{ $item->attributes->image }}" class="w-20 rounded" alt="Thumbnail">
                        </a>
                      </td>
                      <td>
                        <a href="{{ route('products.show',$item->id) }}">
                          <p class="mb-2 md:ml-4">{{ $item->name }}</p>
                        </a>
                      </td>
                      <td class="justify-center mt-6 md:justify-end md:flex ">
                        <div class="">
                          <div class="relative flex flex-row w-full h-8">
                            
                            <form action="{{ route('cart.update') }}" method="POST">
                              @csrf
                              <input type="hidden" name="id" value="{{ $item->id}}" >
                              
                              <button type="submit" class="">
                            <input type="number" name="quantity" value="{{ $item->quantity }}" 
                            class="w-6 text-white bg-red-500" />
                            </button>
                            </form>
                          </div>
                        </div>
                      </td>
                      <td class="hidden text-right md:table-cell">
                        <span class="text-sm font-medium lg:text-base">
                            ${{ $item->price* $item->quantity}}
                        </span>
                      </td>
                      <td class="hidden text-right md:table-cell">
                        <form action="{{ route('cart.remove') }}" method="POST">
                          @csrf
                          <input type="hidden" value="{{ $item->id }}" name="id">
                          <button class="px-4 py-2 text-white bg-red-600 rounded">x</button>
                      </form>
                        
                      </td>
                    </tr>
                    @endforeach
                     
                  </tbody>
                  <thead>
                    <tr class="h-12 uppercase">
                        <th class="hidden md:table-cell"></th>
                        <th class="text-left"></th>
                        <th class="pl-5 text-left lg:text-right lg:pl-0">
                          <span class="hidden lg:inline"></span>
                          <span class="lg:hidden" title="Quantity"></span>
                        </th>
                        <th class="hidden text-right md:table-cell">Total: ${{ Cart::getTotal() }}</th>
                        <th class="hidden text-right md:table-cell"> 
                            <form action="{{ route('cart.clear') }}" method="POST">
                                @csrf
                                <button class=" text-white focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Remove All Cart</button>
                              </form>
                             </th>
                    </thead>

                </table>
                {{-- <div class="pl-3  lg:text-right ">
                 Total: ${{ Cart::getTotal() }}
                </div>
                <div class="text-right pr-3">
                  <form action="{{ route('cart.clear') }}" method="POST">
                    @csrf
                    <button class=" text-white focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Remove All Cart</button>
                  </form>
                </div> --}}
                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 text-right">
                  <svg aria-hidden="true" class="mr-2 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path></svg>
                  Buy now
                </button>

              </div>
            </div>
          </div>
    </div>
</main>

@endsection
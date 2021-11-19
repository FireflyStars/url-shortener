<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Url Sortening') }}
        </h2>
    </x-slot>

    <div class="py-12">
        {{-- This is the part to check POST API --}}
        {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="mt-10 sm:mt-0">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                      <div class="mt-5 md:mt-0 md:col-span-3">
                        <form action="{{ route('api.url.resource') }}" method="POST">
                          <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                              <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6">
                                    @if ($errors->any())
                                      <ul class="list-disc list-inside text-sm text-red-600">
                                          @foreach ($errors->get('destination') as $error)
                                              <li>{{ $error }}</li>
                                          @endforeach
                                      </ul>                         
                                    @endif
                                    <input type="text" name="destination" id="destination" autocomplete="destination" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('destination') }}">
                                    <label for="destination" class="block mt-1 text-sm font-medium text-gray-700 @error('destination') is-invalid @enderror">Enter the url you want to check.</label>
                                </div>
                              </div>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                              <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Check Api
                              </button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                </div>
            </div>
        </div> --}}
        {{-- This is the part to check POST API --}}

        {{-- The form to generate shorten url --}}
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="mt-10 sm:mt-0">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                      <div class="mt-5 md:mt-0 md:col-span-3">
                        <form action="{{ route('shortened-url.store') }}" method="POST">
                          @csrf
                          <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                              <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6">
                                    @if(session('success'))
                                      <div class="bg-green-500 text-center mb-5 py-4 rounded-xl font-bold text-xl text-white">Successfully shorted the url</div>
                                    @endif
                                    @if ($errors->any())
                                      <ul class="list-disc list-inside text-sm text-red-600">
                                          @foreach ($errors->get('destination') as $error)
                                              <li>{{ $error }}</li>
                                          @endforeach
                                      </ul>                         
                                    @endif
                                    <input type="text" required name="destination" id="destination" autocomplete="destination" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('destination') }}">
                                    <label for="destination" class="block mt-1 text-sm font-medium text-gray-700 @error('destination') is-invalid @enderror">Enter the url you want to shorten.</label>
                                </div>
                              </div>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                              <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Shorten Url
                              </button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- lists of shorten url --}}
        <div class="max-w-7xl mx-auto my-12 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white border-b border-gray-200">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                          <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                              <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                  <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider uppercase">
                                      slug
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider uppercase">
                                      url
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider uppercase">
                                      created at
                                    </th>
                                  </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($urls as $item)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <a href="{{ route('shortened-url.show', ['shortened_url'=> $item]) }}" target="__blank" class="text-gray-500 hover:text-indigo-500">{{ $item->full_shortened_url }}</a>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                <a href="{{ $item->destination }}" target="__blank" class="text-gray-500 hover:text-indigo-500">{{ $item->destination }}</a>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">
                                                {{ $item->created_at->format('m/d/Y, h:i A') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

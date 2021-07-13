@extends('layouts.guest')
@section('content')
<form class="space-y-4 text-gray-700">
    <div class="flex flex-wrap">
      <div class="w-full">
        <label class="block mb-1" for="formGridCode_card">Card number</label>
        <input class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" id="formGridCode_card"/>
      </div>
    </div>
    <div class="flex flex-wrap -mx-2 space-y-4 md:space-y-0">
      <div class="w-full px-2 md:w-1/2">
        <label class="block mb-1" for="formGridCode_name">First name</label>
        <input class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" id="formGridCode_name"/>
      </div>
      <div class="w-full px-2 md:w-1/2">
        <label class="block mb-1" for="formGridCode_last">Last name</label>
        <input class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" id="formGridCode_last"/>
      </div>
    </div>
    <div class="flex flex-wrap -mx-2 space-y-4 md:space-y-0">
      <div class="w-full px-2 md:w-1/3">
        <label class="block mb-1" for="formGridCode_month">Month</label>
        <input class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" id="formGridCode_month"/>
      </div>
      <div class="w-full px-2 md:w-1/3">
        <label class="block mb-1" for="formGridCode_year">Year</label>
        <input class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" id="formGridCode_year"/>
      </div>
      <div class="w-full px-2 md:w-1/3">
        <label class="block mb-1" for="formGridCode_cvc">CVC</label>
        <input class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" id="formGridCode_cvc"/>
      </div>
    </div>
  </form>
@endsection

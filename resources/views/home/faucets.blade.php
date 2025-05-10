@extends('layouts.main')
@section('content')
<h6 class="mx-auto text-lg text-center font-bold text-gray-600">
  不要让寻找水龙头耽误您的进度
</h6>
<h1 class="mx-auto mt-2 text-3xl font-bold tracking-tight sm:text-5xl lg:text-7xl">
  免费测试网水龙头
</h1>
<p class="mx-auto mt-6 max-w-xl text-lg font-normal sm:max-w-2xl md:text-xl lg:max-w-3xl text-gray-500">
在多个区块链上免费领取测试网资金，用于构建你的下一个项目
</p>


<div class="overflow-x-auto mt-6">
  <table class="min-w-full bg-white rounded-xl overflow-hidden shadow-md">
    <thead class="bg-gray-100 text-gray-700">
      <tr>
        <th class="text-left py-3 px-6">网络</th>
        <th class="text-left py-3 px-6">网址</th>
      </tr>
    </thead>
    <tbody class="text-gray-600">
      @foreach($faucets as $faucet)
      <tr class="border-b hover:bg-gray-50">
        <td class="py-3 px-6">
          {{$faucet['name']}}
        </td>
        <td class="py-3 px-6">
          <a href="{{$faucet['url']}}" target="_blank">
          {{$faucet['url']}}
          </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>


@endsection
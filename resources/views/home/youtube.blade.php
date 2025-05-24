
@extends('layouts.main')
@section('content')
<div class="bg-white rounded-2xl shadow-md p-6 flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-6">
      <!-- 头像 -->
       <!--
      <img src="https://via.placeholder.com/100" alt="频道头像" class="w-24 h-24 rounded-full shadow" />
-->
      <!-- 文本内容 -->
      <div class="flex-1">
        <h1 class="text-2xl font-bold">BlockDaoLearn链道学堂</h1>
        <p class="mt-2 mb-4 text-gray-600">专注于分享区块链工具使用教程、钱包操作、交易平台导航等实用内容。</p>


        <a href="https://www.youtube.com/channel/UC77ST5nwquF3eMsuLq-SF4w?sub_confirmation=1" 
            target="_blank" 
            class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-full text-sm font-semibold">
            订阅频道 🔔
        </a>
      </div>
</div>
@endsection
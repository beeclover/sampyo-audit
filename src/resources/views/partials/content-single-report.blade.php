<article @php(post_class())>
  <div class="lg:container max-w-[1000px] overflow-x-hidden">
    <div class="grid grid-cols-[100px,1fr] lg:grid-cols-[170px,1fr] text-[14px] items-center border-t border-b border-mineShaft-500 mb-[60px]">
      <div class="min-h-[60px] flex items-center self-start">
        <div class="px-[8px] lg:px-[24px] font-medium">제목</div>
      </div>
      <div>{!! $title !!}</div>
      <div class="h-px bg-mineShaft-100 col-span-2"></div>
  
      <div class="min-h-[60px] flex items-center self-start">
        <div class="px-[8px] lg:px-[24px] font-medium">성명</div>
      </div>
      <div>{!! $name !!}</div>
      <div class="h-px bg-mineShaft-100 col-span-2"></div>
  
      <div class="min-h-[60px] flex items-center self-start">
        <div class="px-[8px] lg:px-[24px] font-medium">연락처</div>
      </div>
      <div>{!! $contact !!}</div>
      <div class="h-px bg-mineShaft-100 col-span-2"></div>
  
      <div class="min-h-[60px] flex items-center self-start">
        <div class="px-[8px] lg:px-[24px] font-medium">이메일 주소</div>
      </div>
      <div>{!! $email !!}</div>
      <div class="h-px bg-mineShaft-100 col-span-2"></div>
      @if (current_user_can('moderate_comments'))
        <div class="h-full max-h-[120px] min-h-[60px] flex items-center self-start">
          <div class="px-[8px] lg:px-[24px] font-medium">내용</div>
        </div>
        <div class="prose prose-sm py-[36px]">
          @php(the_content())
        </div>
        <div class="h-px bg-mineShaft-100 col-span-2"></div>
      @endif
  
      <div class="h-full max-h-[120px] min-h-[60px] flex items-center self-start">
        <div class="px-[8px] lg:px-[24px] font-medium">첨부파일</div>
      </div>
      <div class="prose prose-sm py-[20px]">
        <ul>
          @foreach ($files as $file)
            <li>
              @if (current_user_can('moderate_comments'))
                <a href="{!! $file['url'] !!}" download>{!! $file['name'] !!}</a>
              @else
                {!! $file['name'] !!}
              @endif
            </li>
          @endforeach
        </ul>
      </div>
      <div class="h-px bg-mineShaft-100 col-span-2"></div>
  
      <div class="min-h-[60px] flex items-center self-start">
        <div class="px-[8px] lg:px-[24px] font-medium">답변여부</div>
      </div>
      <div class="flex justify-between items-center gap-x-[16px]">
        <span class="@if(get_field('status', get_the_ID()) === '답변완료') text-lochmara-500 @endif">
          {!! get_field('status', get_the_ID()) !!}
        </span>
      
        @if (current_user_can('moderate_comments') && preg_match("/[대기중|처리중]/", $status = get_field('status', get_the_ID())))
          <form action="{!! get_the_permalink() !!}" method="post" class="m-0">
            <input type="hidden" name="post_id" value="{!! get_the_ID() !!}">
            <input type="hidden" name="status" value="{!! $status !!}">
            @if ($status === '처리중') 
              <button type="submit" class="btn px-[8px] py-[4px] font-normal">
                <i class="icon-exchange"></i> 대기중
              </button>
            @elseif($status === '대기중')
              <button type="submit" class="btn px-[8px] py-[4px] font-normal">
                <i class="icon-exchange"></i> 처리중 
              </button>
              @endif
          </form>
        @endif
      </div>
    </div>
    @if (current_user_can('moderate_comments'))
      <div class="flex justify-end mt-[-40px] mb-[50px]">
        <a href="javascript:window.print();" class="btn bg-white border-[#707070] border text-mineShaft-500 text-[14px] font-light px-[22px]">
          <i class="icon-print"></i> 제보내용 출력하기
        </a>
      </div>
    @endif

    @if (!empty($answer) || current_user_can('moderate_comments'))
      <div class="text-[20px] text-mineShaft-500 font-bold mb-[19px]">답변쓰기</div>
      @if (!empty($answer))
      <form method="post" id="" class="comment-form">
        <p class="hidden">
          <input type="hidden" name="action" value="editedcomment">
          <input type="hidden" name="comment_ID" value="{!! $answer->comment_ID !!}">
          <input type="hidden" name="comment_post_ID" value="{!! get_the_ID() !!}">
          <input type="hidden" name="request" value="{!! get_the_permalink() !!}">
        </p>
      @else
      <form action="/wp-comments-post.php" method="post" id="commentform" class="comment-form" novalidate="">
        <p class="form-submit hidden">
          <input type="hidden" name="comment_post_ID" value="{!! get_the_ID() !!}" id="comment_post_ID">
          <input type="hidden" name="comment_parent" id="comment_parent" value="0">
        </p>
      @endif
        <div id="form">
          <vue-form @if (!empty($answer)) content="{{ $answer->comment_content }}" @endif></vue-form>
        </div>
        <div class="col-span-2 mb-[50px]"></div>
      </form>
    @endif
    <div class="text-center flex gap-[5px] justify-center flex-wrap">
      <button class="btn-lochmara w-[140px] bg-lochmara-600" @click.prevent="document.querySelector('.comment-form').submit()">@if (!empty($answer))수정@else 답변등록@endif</button>
      @if (current_user_can('moderate_comments') && ($status = get_field('status', get_the_ID())) === '답변완료')
      <div x-data="{editor: false}">
        <button @click.prevent="editor=!editor" class="btn bg-[#d63315] w-[140px]">
          삭제
        </button>
        <div id="bgMask" class="fixed top-0 bottom-0 left-0 right-0 w-full h-full bg-black opacity-50 z-[9010]" x-cloak x-show="editor"></div>
        <div 
          x-show="editor"
          x-cloak
          @click.away="editor = false"
          x-transition:enter="transition ease-out duration-300"
          x-transition:enter-start="opacity-0"
          x-transition:enter-end="opacity-100 "
          x-transition:leave="transition ease-in duration-200"
          x-transition:leave-start="opacity-100"
          x-transition:leave-end="opacity-0"
          class="bg-white fixed position-center max-w-[300px] w-[90%] min-h-[160px] p-[20px] z-[9010] flex flex-col justify-between">
          <p class="text-left text-[18px] mb-[20px]">
            답변을 삭제하시겠습니까?
          </p>
          <form action="{!! get_the_permalink() !!}" method="post" class="m-0">
            <input type="hidden" name="post_id" value="{!! get_the_ID() !!}">
            <input type="hidden" name="status" value="{!! $status !!}">
            <div class="flex gap-[5px] justify-end">
              <button type="submit" class="btn-lochmara bg-lochmara-600">
                확인
              </button>
              <button @click.prevent="editor=!editor" class="btn">
                취소
              </button>
            </div>
          </form>
        </div>
      </div>
        @endif
      <a href="/report/?title=처리결과%20확인" class="btn w-[140px]">목록으로</a>
    </div>
  </div>
</article>

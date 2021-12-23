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
  
      <div class="h-full max-h-[120px] min-h-[60px] flex items-center self-start">
        <div class="px-[8px] lg:px-[24px] font-medium">내용</div>
      </div>
      <div class="prose prose-sm py-[36px]">
        @php(the_content())
      </div>
      <div class="h-px bg-mineShaft-100 col-span-2"></div>
  
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
            <button type="submit" class="btn px-[8px] py-[4px] font-normal">
              @if ($status === '처리중') 
                <i class="icon-exchange"></i> 대기중
              @elseif($status === '대기중')
                <i class="icon-exchange"></i> 처리중 
              @else
                <i class="icon-trash-empty"></i> 답변삭제
              @endif
            </button>
          </form>
        @endif
      </div>

      @if (!empty($answer) || current_user_can('moderate_comments'))
        <div class="h-px bg-mineShaft-100 col-span-2 mb-[40px]"></div>
        <div class="col-span-2 lg:col-span-1 h-full flex self-start bg-[#f5f5f5] pt-[16px] lg:py-[36px]">
          <div class="max-h-[90px] lg:min-h-[60px] px-[20px] lg:px-[24px] font-medium">답변내용</div>
        </div>
        <div x-data="{editor: false}" x-effect="bodyScrollLock(editor)" class="col-span-2 lg:col-span-1 prose prose-sm bg-[#f5f5f5] min-h-[300px] relative lg:overflow-hidden px-[20px] lg:px-[24px] py-[34px]">
          @if (!empty($answer))
            <div class="max-w-[90%] prose prose-sm ProseMirror !border-none !p-0 !min-h-0 transition-all !whitespace-normal">
              {!! $answer->comment_content !!}
            </div>
          @endif
          @if (current_user_can('moderate_comments'))
            <div class="absolute right-0 top-[-37px] lg:top-0 text-[20px] flex group">
              <button @click.prevent="editor=!editor" class="relative z-10 group-hover:text-white transition-all w-[32px] h-[32px] flex items-center justify-center">
                <i class="icon-edit"></i>
              </button>
              <div class="absolute w-[88px] h-[88px] rotate-45 bg-mineShaft-200 group-hover:bg-lochmara-500 transition-all -translate-x-1/2 -translate-y-1/2 right-0 left-full" style="clip-path: polygon(50% 50%, 100% 100%, 0% 100%);"></div>
            </div>
            <div id="bgMask" class="fixed top-0 bottom-0 left-0 right-0 w-full h-full bg-black opacity-50 z-[9010]" x-cloak x-show="editor"></div>
            <div 
              x-show="editor"
              x-cloak
              @click.away="editor = false"
              x-transition:enter="transition ease-out delay-600 duration-300"
              x-transition:enter-start="opacity-0"
              x-transition:enter-end="opacity-100"
              x-transition:leave-start="opacity-100"
              x-transition:leave-end="opacity-0"
              class="prose prose-sm bg-white max-w-[720px] w-[90%] max-h-[80%] fixed position-center z-[9010] overflow-y-auto">
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
                <input name="submit" type="submit" id="submit" class="submit btn cursor-pointer" value="@if (!empty($answer))답변수정@else 제출@endif"> 
              </form>
            </div>
          @endif
        </div>
        <div class="col-span-2 mb-[50px]"></div>
      @endif
    </div>
    <div class="text-center">
      <a href="/report/?title=처리결과%20확인" class="btn">목록으로</a>
      <a href="javascript:window.print();" class="btn">출력하기</a>
    </div>
  </div>
</article>

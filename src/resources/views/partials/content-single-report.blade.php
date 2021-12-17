<article @php(post_class())>
  <div class="container max-w-[1000px]">
    <div class="grid grid-cols-[170px,1fr] text-[14px] items-center border-t border-b border-mineShaft-500 mb-[60px]">
      <div class="h-[60px] flex items-center self-start">
        <div class="px-[24px] font-medium">제목</div>
      </div>
      <div>{!! $title !!}</div>
      <div class="h-px bg-mineShaft-100 col-span-2"></div>
  
      <div class="h-[60px] flex items-center self-start">
        <div class="px-[24px] font-medium">성명</div>
      </div>
      <div>{!! $name !!}</div>
      <div class="h-px bg-mineShaft-100 col-span-2"></div>
  
      <div class="h-[60px] flex items-center self-start">
        <div class="px-[24px] font-medium">연락처</div>
      </div>
      <div>{!! $contact !!}</div>
      <div class="h-px bg-mineShaft-100 col-span-2"></div>
  
      <div class="h-[60px] flex items-center self-start">
        <div class="px-[24px] font-medium">이메일 주소</div>
      </div>
      <div>{!! $email !!}</div>
      <div class="h-px bg-mineShaft-100 col-span-2"></div>
  
      <div class="h-full max-h-[120px] min-h-[60px] flex items-center self-start">
        <div class="px-[24px] font-medium">내용</div>
      </div>
      <div class="prose prose-sm py-[36px]">
        @php(the_content())
      </div>
      <div class="h-px bg-mineShaft-100 col-span-2"></div>
  
      <div class="h-[60px] flex items-center self-start">
        <div class="px-[24px] font-medium">첨부파일</div>
      </div>
      <div class="prose prose-sm">
        <ul>
          @foreach ($files as $file)
            <li>
              @if (current_user_can('administrator'))
                <a href="{!! $file['url'] !!}">{!! $file['name'] !!}</a>
              @else
                {!! $file['name'] !!}
              @endif
            </li>
          @endforeach
        </ul>
      </div>
      <div class="h-px bg-mineShaft-100 col-span-2"></div>
  
      <div class="h-[60px] flex items-center self-start">
        <div class="px-[24px] font-medium">답변여부</div>
      </div>
      <div>{!! get_field('status', get_the_ID()) !!}</div>

      @if (!empty($answer) || current_user_can('administrator'))
        <div class="h-px bg-mineShaft-100 col-span-2 mb-[40px]"></div>
        <div class="h-full flex self-start bg-[#f5f5f5] py-[36px]">
          <div class="max-h-[90px] min-h-[60px] px-[24px] font-medium">답변내용</div>
        </div>
        <div x-data="{editor: false}" class="prose prose-sm bg-[#f5f5f5] min-h-[500px] relative overflow-hidden py-[34px]">
          @if (!empty($answer))
            <div class="absolute right-0 top-0 text-[20px] flex group">
              <button @click.prevent="editor=!editor" class="relative z-10 group-hover:text-white transition-all w-[32px] h-[32px] flex items-center justify-center">
                <i class="icon-edit"></i>
              </button>
              <div class="absolute w-[88px] h-[88px] rotate-45 bg-mineShaft-200 group-hover:bg-lochmara-500 transition-all -translate-x-1/2 -translate-y-1/2 right-0 left-full"></div>
            </div>
            <div class="max-w-[90%] prose prose-sm ProseMirror !border-none !p-0 !min-h-0 transition-all !whitespace-normal" :class="{'mb-[100px] opacity-0': editor}">
              {!! $answer->comment_content !!}
            </div>
          @endif
          @if (current_user_can('administrator'))
            <div 
            x-show="editor"
            x-cloak
            x-transition:enter="transition ease-out delay-600 duration-300"
            x-transition:enter-start="opacity-0 transform scale-90"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-90"
            class="max-w-[90%] w-full prose prose-sm absolute z-10 top-[34px] bg-white">
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
                  <input type="hidden" id="_wp_unfiltered_html_comment_disabled" name="_wp_unfiltered_html_comment" value="08076aa9ac"><script>(function(){if(window===window.parent){document.getElementById('_wp_unfiltered_html_comment_disabled').name='_wp_unfiltered_html_comment';}})();</script>
                </p>
              @endif
                <div id="form">
                  <vue-form @if (!empty($answer)) content="{{ $answer->comment_content }}" @endif></vue-form>
                </div>
                <input name="submit" type="submit" id="submit" class="submit btn" value="@if (!empty($answer))답변수정@else 제출@endif"> 
              </form>
            </div>
          @endif
        </div>
      @endif
    </div>
    <div class="text-center">
      <a href="/report/?title=처리결과%20확인" class="btn">목록으로</a>
    </div>
  </div>
</article>

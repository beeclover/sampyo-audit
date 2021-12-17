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
      @if (current_user_can('administrator'))
        <div class="h-px bg-mineShaft-100 col-span-2"></div>
        <div class="h-[60px] flex items-center self-start">
          <div class="px-[24px] font-medium">답변하기</div>
        </div>
        <div>
          답변필드
        </div>
      @endif
    </div>
    <div class="text-center">
      <a href="/report/?title=처리결과%20확인" class="btn">목록으로</a>
    </div>
  </div>

  @php(comments_template())
</article>

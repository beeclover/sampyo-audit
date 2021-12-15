<template>
  <form method="post" :action="this.action" class="text-[14px] text-[#333333]">
    <section class="mb-[60px]">
      <div class="grid grid-cols-[120px,1fr] items-center gap-y-[8px] gap-x-[25px] py-[14px] border-t border-b border-black">
        <label for="user">
          <span class="required"></span>아이디
        </label>
        <div>
          <input type="text" name="user" value="" id="user" class="border border-[#9b9b9b] h-[50px] p-[14px] w-full max-w-[625px]" required />
        </div>
        <div class="col-span-2 h-px bg-[#ebebeb]"></div>
        <label for="password">
          <span class="required"></span>비밀번호
        </label>
        <div>
          <input 
            type="password" 
            name="password" 
            id="password" 
            class="border h-[50px] p-[14px] w-full max-w-[625px] border-[#9b9b9b]" 
            @change="changePassword"
            :value="password"
            required 
          />
        </div>
        <div class="col-span-2 h-px bg-[#ebebeb]"></div>
        <label for="password-check">
          <span class="required"></span>비밀번호 확인
        </label>
        <div>
          <input 
            type="password" 
            name="password-check" 
            id="password-check" 
            @change="changePassword2"
            :value="password2 !== password ? null : password2" 
            :class="`border h-[50px] p-[14px] w-full max-w-[625px] ${password2 !== password ? 'border-[#FA375C] placeholder-[#FA375C]' : 'border-[#9b9b9b]'}`" 
            :placeholder="password2 !== password ? '비밀번호가 일치하지 않습니다.' : ''"
            required
          />
        </div>
        <div class="col-span-2 h-px bg-[#ebebeb]"></div>
        <div class="col-span-2">
          <div class="py-[14px] text-[#f83131]">
            아이디 또는 비밀번호를 잊어버리면 다시 로그인 할 수 없으니 잘 기억해주세요.
          </div>
        </div>
      </div>
    </section>
    <section class="mb-[51px]">
      <div class="flex justify-between items-end gap-x-[20px]">
        <span class="text-[20px] font-bold">선택 내용 입력</span>
        <span class="text-[#999999]">필수입력 사항은 아니며, 미입력시 보상에서 제외됩니다.</span>
      </div>
      <div class="grid grid-cols-[120px,1fr] items-center gap-y-[8px] gap-x-[25px] py-[14px]">
        <div class="col-span-2 h-px bg-[#ebebeb]"></div>
        <label for="name">
          성명
        </label>
        <div>
          <input type="text" name="last_name" value="" id="name" class="border border-[#9b9b9b] h-[50px] p-[14px] w-full max-w-[220px]" />
        </div>
        <div class="col-span-2 h-px bg-[#ebebeb]"></div>
        <label for="contact">
          연락처
        </label>
        <div>
          <input type="text" name="contact" value="" id="contact" class="border border-[#9b9b9b] h-[50px] p-[14px] w-full max-w-[220px]" placeholder="‘-‘ 없이 숫자만 입력해주세요." />
        </div>
        <div class="col-span-2 h-px bg-[#ebebeb]"></div>
        <label for="name">
          이메일
        </label>
        <div class="flex items-center gap-x-[7px]">
          <input type="text" name="email" hidden readonly :value="re(email)">
          <input type="text" :value="fEmail" @change="fEmailChange" id="name" :class="`border h-[50px] p-[14px] w-full max-w-[220px] ${email === '' || re(email) ? 'border-[#9b9b9b]' : 'border-[#FA375C]'}`" />
          <span>@</span>
          <input type="text" :value="bEmail" @change="bEmailChange" id="name" :class="`border h-[50px] p-[14px] w-full max-w-[220px] ${email === '' || re(email) ? 'border-[#9b9b9b]' : 'border-[#FA375C]'}`" :readonly="select !== ''" />
          <select @change="bEmailChange" class="border border-[#9b9b9b] h-[50px] px-[14px] py-[8px]">
            <option value="">직접입력하기</option>
            <option value="naver.com">naver.com</option>
            <option value="gmail.com">gmail.com</option>
          </select>
        </div>
        <div class="col-span-2 h-px bg-[#ebebeb]"></div>
      </div>
    </section>
    <section>
      <div class="text-[20px] font-bold mb-[20px]">선택 내용 입력</div>
      <div class="overflow-y-auto h-[300px] p-[44px] overflow-hidden border border-[#707070] mb-[20px]">
        <div class="prose">
          <div>
            ■ 개인정보의 수집 및 이용목적
          </div>
          <p>
            회사는 수집한 개인정보를 다음의 목적을 위해 활용합니다.
          </p>
          <ul>
            <li>회원 관리 : 불만처리 등 민원처리</li>
            <li>기타 : 사이버감사실 고객상담</li>
          </ul>
          <br/>
          <div>
            ■ 수집하는 개인정보 항목
          </div>
          <p>
            회사는 사이버감사실 등을 위해 아래와 같은 개인정보를 수집하고 있습니다.
          </p>
          <ul>
            <li>수집항목 : 성명, 연락처, 이메일주소, 비밀번호, 접속IP정보</li>
            <li>개인정보 수집방법 : 홈페이지(사이버 감사실)</li>
          </ul>
          <br/>
          <div>
            ■ 개인정보의 보유 및 이용기간
          </div>
          <p>
            원칙적으로, 개인정보 수집 및 이용목적이 달성된 후에는 해당 정보를 지체 없이 파기합니다.<br/>
            단, 다음의 정보에 대해서는 아래의 이유로 명시한 기간 동안 보존합니다.
          </p>
          <ul>
            <li>계약 또는 청약철회 등에 관한 기록 : 5년</li>
            <li>대금결제 및 재화 등의 공급에 관한 기록 : 5년</li>
            <li>소비자의 불만 또는 분쟁처리에 관한 기록 : 3년</li>
            <li>보존 항목 : 성명, 연락처, 이메일주소, 비밀번호, 접속IP정보</li>
            <li>보존 근거 : 사이버감사실 고객의견 확인 및 답변, 처리사항 고지</li>
            <li>보존 기간 : 1 년</li>
          </ul>
        </div>
      </div>
      <div class="pb-[36px] border-b border-black mb-[60px]">
        <div class="flex items-center gap-x-[12px]">
          <input type="checkbox" name="privacy-policy" id="privacy-policy" class="w-auto" required>
          <label for="privacy-policy" class="cursor-pointer">
            <span>약관에 동의합니다.</span>
          </label>
        </div>
      </div>
      <div class="flex justify-center">
        <button type="submit" class="btn bg-[#818286] py-[11px] w-[140px] text-center text-white font-bold text-[16px]">다음</button>
      </div>
    </section>
  </form>
</template>

<script>
export default {
  name: 'Signup',
  props: {
    action: String,
  },
  data() {
    return {
      select: '',
      fEmail: '',
      bEmail: '',
      email: '',
      password: '',
      password2: '',
    }
  },
  methods: {
    bEmailChange(e) {
      console.log(e.target.value);
      this.bEmail = e.target.value;
      this.email = this.fEmail + '@' + this.bEmail;
    },
    fEmailChange(e) {
      console.log(e.target.value);
      this.fEmail = e.target.value;
      this.email = this.fEmail + '@' + this.bEmail;
    },
    re(email) {
      const result = String(email).toLowerCase().match(/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);
      if (result === null) {
        return false;
      } else {
        return this.email;
      }
    },
    changePassword(e) {
      this.password = e.target.value;
    },
    changePassword2(e) {
      this.password2 = e.target.value;
    },
  },
}
</script>

<style>
  input {
    width: 100%;
  }
</style>
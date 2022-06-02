<template>
  <div :id="'file-' + this.index">
    <div class="inputWrap flex items-center gap-x-[13px]">
      <input
        hidden
        type="file"
        :name="'file-' + this.index"
        accept=".png, .jpg, .jpge, .zip, .pdf, .pptx, .ppt, .xlsx, .webp"
      />
      <div>{{ label }}</div>
      <button
        v-if="label"
        @click.prevent="this.remove"
        aria-label="remove"
        class="w-[24px] h-[24px] border border-[#707070] rounded-[2px] bg-white"
      >
        <svg
          class="w-full h-full fill-[#707070]"
          id="Layer_3"
          height="512"
          viewBox="0 0 32 32"
          width="512"
          xmlns="http://www.w3.org/2000/svg"
          data-name="Layer 3"
        >
          <path
            d="m17.414 16 6.293-6.293a1 1 0 0 0 -1.414-1.414l-6.293 6.293-6.293-6.293a1 1 0 0 0 -1.414 1.414l6.293 6.293-6.293 6.293a1 1 0 1 0 1.414 1.414l6.293-6.293 6.293 6.293a1 1 0 0 0 1.414-1.414z"
          />
        </svg>
      </button>
    </div>
  </div>
</template>

<script>
import checkbrowser from '../../../functions/checkbrowser';

export default {
  props: {
    remove: Function,
    index: Number,
    loaded: Function,
  },
  data() {
    return {
      label: null,
    };
  },
  mounted() {
    const el = this.$el;
    const input = el.querySelector('input');
    document.body.onfocus = () => {
      const target = document.querySelector(`#file-${this.index}`);
      setTimeout(() => {
        const file = target.querySelector('input');

        if (file.value.length) {
          target.classList.remove('hidden');
          file.files[0] && (this.label = file.files[0].name);
          this.loaded();
        } else {
          this.loaded();
          target.remove();
        }
      }, 1000);
      // reset
      document.body.onfocus = null;
    };

    const { sUsrAg } = checkbrowser();
    if (sUsrAg.indexOf('iPhone') !== -1) {
      input.addEventListener('change', () => {
        const file = input.files[0];
        if (file) {
          this.label = file.name;
          this.loaded();
        }
      });
    }

    input.click();
  },
};
</script>

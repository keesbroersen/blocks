<template>
  <div class="dev__page">
    <DevSidebar>
      <a 
        href="#dev-colors"
      >Colors</a>
      <a 
        href="#dev-typography"
      >Typography</a>
      <a 
        href="#dev-icons"
      >Icons</a>
      <a 
        href="#dev-buttons"
      >Buttons</a>
      <a 
        href="#dev-breakpoints"
      >Breakpoints</a>
      <a 
        href="#dev-containers"
      >Containers</a>
    </DevSidebar>
    <div class="dev__content">
      <section 
        id="dev-colors" 
        class="dev__section">
        <div class="dev__container">
          <h2 class="dev-title">Colors</h2>
          <p style="margin: 0 0 48px;">
            Colors named by their function, not their colors. This makes it more clear when to use them.<br>
            Should we add the proper color with every background color? So, white on black, black on white, etc.?<br>
            Find in <span class="dev-class">src/colors.scss</span>.
          </p>

          <div class="dev-colors">
            <DevStyleColor 
              name="Primary" 
              color="#3441AB"
              mixin="$primary"/>
            <DevStyleColor 
              name="Secondary" 
              color="#FA7D8E"
              mixin="$secondary"/>
            <DevStyleColor 
              name="Black" 
              color="#000000"
              mixin="$black"/>
            <DevStyleColor 
              name="Black support" 
              color="#4A4A4A"
              mixin="$blacksupport"/>
            <DevStyleColor 
              name="Light grey" 
              color="#F7F7F7"
              mixin="$lightgrey"
              light/>
            <DevStyleColor 
              name="White" 
              color="#FFFFFF"
              mixin="$white"
              light/>
          </div>
        </div>
      </section>

      <section 
        id="dev-typography" 
        class="dev__section">
        <div class="dev__container">
          <h2 class="dev-title">Typography</h2>
          <p style="margin: 0 0 48px;">We achieve styling through opt in classes and do not style elements globally. This is to reduced the number of style collisions across projects. Elements can inherit styles from <span class="dev-class">.copy--body</span> or otherwise applied directly.<br><br>
            Typographic elements do not come with any margins attached to them in order to make them more flexible in where they can be used.<br><br>
            They get margins when they are inside a wrapper with a class of <span class="dev-class">.context--content</span>. We may need to work on the naming but the principle is solid.<br>
            Find in <span class="dev-class">src/typography.scss</span>.
          </p>
          <div class="typography-element">
            <div>
              <svg 
                aria-hidden="true" 
                data-prefix="fal" 
                data-icon="desktop" 
                role="img"
                style="height: 24px;"
                xmlns="http://www.w3.org/2000/svg" 
                viewBox="0 0 576 512" 
                class="svg-inline--fa fa-desktop fa-w-18 fa-2x"><path 
                  fill="#333" 
                  d="M528 0H48C21.5 0 0 21.5 0 48v288c0 26.5 21.5 48 48 48h192l-24 96h-72c-8.8 0-16 7.2-16 16s7.2 16 16 16h288c8.8 0 16-7.2 16-16s-7.2-16-16-16h-72l-24-96h192c26.5 0 48-21.5 48-48V48c0-26.5-21.5-48-48-48zM249 480l16-64h46l16 64h-78zm295-144c0 8.8-7.2 16-16 16H48c-8.8 0-16-7.2-16-16V48c0-8.8 7.2-16 16-16h480c8.8 0 16 7.2 16 16v288z" 
                  class=""/></svg>
            </div>
            <div>
              <svg 
                aria-hidden="true" 
                data-prefix="fal" 
                data-icon="mobile" 
                style="height: 24px; margin: 0 0 0 20px;"
                role="img" 
                xmlns="http://www.w3.org/2000/svg" 
                viewBox="0 0 320 512" 
                class="svg-inline--fa fa-mobile fa-w-10 fa-2x"><path 
                  fill="#333" 
                  d="M192 416c0 17.7-14.3 32-32 32s-32-14.3-32-32 14.3-32 32-32 32 14.3 32 32zM320 48v416c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V48C0 21.5 21.5 0 48 0h224c26.5 0 48 21.5 48 48zm-32 0c0-8.8-7.2-16-16-16H48c-8.8 0-16 7.2-16 16v416c0 8.8 7.2 16 16 16h224c8.8 0 16-7.2 16-16V48z" 
                  class=""/></svg>
            </div>
          </div>
          <div class="typography-element">
            <div>
              <h1 class="h1">Heading h1</h1>
              <span class="typography-element__property">42px</span>
              <span class="typography-element__class dev-class">.h1</span>
            </div>
            <div class="dev-mobile">
              <h1 class="h1">Heading h1</h1>
              <span class="typography-element__property">36px</span>
              <span class="typography-element__class dev-class">.h1</span>
            </div>
          </div>

          <div class="typography-element">
            <div>
              <h2 class="h2">Heading h2</h2>
              <span class="typography-element__property">36px</span>
              <span class="typography-element__class dev-class">.h2</span>
            </div>
            <div class="dev-mobile">
              <h2 class="h2">Heading h2</h2>
              <span class="typography-element__property">28px</span>
              <span class="typography-element__class dev-class">.h2</span>
            </div>
          </div>

          <div class="typography-element">
            <div>
              <h2 class="h2 h2--accent">Heading h2</h2>
              <span class="typography-element__property">36px</span>
              <span class="typography-element__class dev-class">.h2--accent</span>
            </div>
            <div class="dev-mobile">
              <h2 class="h2 h2--accent">Heading h2</h2>
              <span class="typography-element__property">28px</span>
              <span class="typography-element__class dev-class">.h2--accent</span>
            </div>
          </div>

          <div class="typography-element">
            <div>
              <h3 class="h3">Heading h3</h3>
              <span class="typography-element__property">28px</span>
              <span class="typography-element__class dev-class">.h3</span>
            </div>
            <div class="dev-mobile">
              <h3 class="h3">Heading h3</h3>
              <span class="typography-element__property">22px</span>
              <span class="typography-element__class dev-class">.h3</span>
            </div>
          </div>

          <div class="typography-element">
            <div>
              <h4 class="h4">Heading h4</h4>
              <span class="typography-element__property">22px</span>
              <span class="typography-element__class dev-class">.h4</span>
            </div>
            <div class="dev-mobile">
              <h4 class="h4">Heading h4</h4>
              <span class="typography-element__property">18px</span>
              <span class="typography-element__class dev-class">.h4</span>
            </div>
          </div>

          <div class="typography-element">
            <div>
              <h5 class="h5">Heading h5</h5>
              <span class="typography-element__property">18px</span>
              <span class="typography-element__class dev-class">.h5</span>
            </div>
            <div class="dev-mobile">
              <h5 class="h5">Heading h5</h5>
              <span class="typography-element__property">16px</span>
              <span class="typography-element__class dev-class">.h5</span>
            </div>
          </div>

          <div class="typography-element">
            <div>
              <p class="paragraph">Insert loud discussion about the use of classes and what classes that are being used for the headings. In this we also need to remember that paragraphs should have their own classes too.</p>
              <span class="typography-element__property">14px</span>
              <span class="typography-element__class dev-class">.paragraph</span>
            </div>
            <div class="dev-mobile">
              <p class="paragraph">Insert loud discussion about the use of classes and what classes that are being used for the headings. In this we also need to remember that paragraphs should have their own classes too.</p>
              <span class="typography-element__property">13px</span>
              <span class="typography-element__class dev-class">.paragraph</span>
            </div>
          </div>

          <div class="typography-element">
            <div>
              <p class="paragraph"><a href="#">Link</a></p>
              <span class="typography-element__property">14px</span>
              <span class="typography-element__class dev-class">.link</span>
            </div>
            <div class="dev-mobile">
              <p class="paragraph"><a href="#">Link</a></p>
              <span class="typography-element__property">13px</span>
              <span class="typography-element__class dev-class">.link</span>
            </div>
          </div>
        </div>

      </section>

      <section 
        id="dev-icons" 
        class="dev__section">
        <div class="dev__container">
          <h2 class="dev-title">Icons</h2>
          <p style="margin: 0 0 48px;">The icon pack is FontAwesome. Add <span class="dev-class">.icon</span> to the element to get your icon.<br>
            You can add icons to <span class="dev-class">src/icons.scss</span></p>
        </div>
      </section>

      <section
        id="dev-buttons" 
        class="dev__section">
        <div class="dev__container">
          <h2 class="dev-title">Buttons</h2>
          <p style="margin: 0 0 48px;">Use <span class="class">button</span> for the regular button and <span class="class">button--primary</span>, etc. for their different purposes. If buttons have margins they're provided to them by their parents.<br>
            Find in <span class="dev-class">src/buttons.scss</span>.</p>
          <devStyleButton 
            name="Button primary" 
            class-name="button button--primary"/>
          <devStyleButton 
            name="Button secondary" 
            class-name="button button--secondary"/>
          <devStyleButton 
            name="Button outline" 
            class-name="button button--outline"/>
          <devStyleButton 
            name="Button outline secondary" 
            class-name="button button--outline button--secondary"/>
          <devStyleButton 
            name="Button" 
            class-name="button"/>
        </div>
      </section>

      <section 
        id="dev-breakpoints" 
        class="dev__section">
        <div class="dev__container">
          <h2 class="dev-title">Breakpoints</h2>
          <p style="margin: 0 0 48px;">Breakpoints are at 786px, 1024px and 2024px. Use <span class="dev-var">@include mobile {}</span>, <span class="dev-var">@include tablet {}</span>, <span class="dev-var">@include desktop {}</span> respectively.<br>
            Find in <span class="dev-class">src/breakpoints.scss</span>.
          </p>
          
        </div>
      </section>

      <section 
        id="dev-containers" 
        class="dev__section">
        <div class="dev__container">
          <h2 class="dev-title">Containers</h2>
          <p style="margin: 0 0 48px;">Container width is <strong>1280px</strong>. Defined with <span class="dev-var">$max-width</span>. Margins are 10px on each side.<br>
            Rows (<span class="dev-class">.row</span>) aren't mandatory, but can be useful. Blocks are flex and fill out automaticly. Min width is on <strong>225px</strong>. Use <span class="dev-class">.block--quarter</span> for fixed widths (in percentages).<br>
            Find in <span class="dev-class">src/grid.scss</span>.
          </p>
          <DevContainers/>
        </div>
      </section>
    </div>
  </div>
</template>

<script>
import DevStyleColor from "./DevStyleColor.vue";
import DevStyleButton from "./DevStyleButton.vue";
import DevContainers from "./DevContainers.vue";
import DevSidebar from "./DevSidebar.vue";

export default {
  name: "DevPageBlocks",
  components: {
    DevStyleColor,
    DevStyleButton,
    DevContainers,
    DevSidebar
  },
  props: {},
  data() {
    return {
      data: { type: Object, required: false }
    };
  }
};
</script>

<style lang="scss">
.dev {
  .dev-colors {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr;
    grid-gap: 10px;
  }

  .dev__section {
    border-bottom: 10px solid #f7f7f7;

    &:last-child {
      margin: 0;
    }
  }

  .dev-class {
    border: 1px solid #f7f7f7;
    background: #f7f7f7;
    padding: 0 2px;
    font-family: monospace, sans-serif;
    font-size: 14px;
  }

  .dev-var {
    color: red;
    font-weight: normal;
    font-family: monospace, sans-serif;
    font-size: 14px;
  }

  .typography-element {
    display: flex;
    width: 100%;
    border-bottom: 1px solid #f7f7f7;

    > div {
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 15px 20px 15px 0;
    }

    .dev-mobile {
      border-left: 1px solid #f7f7f7;
      padding: 15px 0 15px 20px;
    }

    &__property {
      font-size: 14px;
      color: #aaa;
      margin: 0 auto 0 15px;
    }

    .paragraph {
      max-width: 50%;
    }
  }
}
</style>

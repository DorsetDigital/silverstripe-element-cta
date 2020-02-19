<% if $Title && $ShowTitle %>
    <div class="ctatitle_holder">
        <h2 class="ctatitle">$Title</h2>
    </div>
<% end_if %>
<div class="cta-block__holder cta-count-$CTAs.Count">
    <% loop $CTAs %>
        <div class="cta-item" style="background-color: #$Up.BackgroundColour">
            <div class="cta-constrainer">
                <% if $Link %>
                <a href="$Link.Link">
                <% end_if %>
                <div class="cta-image__holder">
                    <img src="$CTAImage.ScaleWidth(550).CropHeight(340).URL" alt="$Title"/>
                </div>
                <% if $Link %>
                </a>
                <% end_if %>
                <div class="cta-text__holder" style="border-top-color: #$Up.TitleColour">
                    <p class="title" style="color: #$Up.TitleColour">
                        <% if $Link %>
                        <a href="$Link.Link">
                        <% end_if %>
                        $Title
                        <% if $Link %>
                        </a>
                        <% end_if %>
                    </p>
                    <p class="subtitle" style="color: #$Up.SubtitleColour">$SubTitle</p>
                </div>
            </div>
        </div>
    <% end_loop %>
</div>



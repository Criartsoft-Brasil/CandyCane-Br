<%= breadcrumb link_to(l(:label_board_plural), {:controller => 'boards', :action => 'index', :project_id => @project}),
               link_to(h(@board.name), {:controller => 'boards', :action => 'show', :project_id => @project, :id => @board}) %>

<div class="contextual">
    <%= watcher_tag(@topic, User.current) %>
    <%= link_to_remote_if_authorized l(:button_quote), { :url => {:action => 'quote', :id => @topic} }, :class => 'icon icon-comment' %>
    <%= link_to(l(:button_edit), {:action => 'edit', :id => @topic}, :class => 'icon icon-edit') if @message.editable_by?(User.current) %>
    <%= link_to(l(:button_delete), {:action => 'destroy', :id => @topic}, :method => :post, :confirm => l(:text_are_you_sure), :class => 'icon icon-del') if @message.destroyable_by?(User.current) %>
</div>

<h2><%=h @topic.subject %></h2>

<div class="message">
<p><span class="author"><%= authoring @topic.created_on, @topic.author %></span></p>
<div class="wiki">
<%= textilizable(@topic.content, :attachments => @topic.attachments) %>
</div>
<%= link_to_attachments @topic, :author => false %>
</div>
<br />

<% unless @replies.empty? %>
<h3 class="icon22 icon22-comment"><%= l(:label_reply_plural) %></h3>
<% @replies.each do |message| %>
  <a name="<%= "message-#{message.id}" %>"></a>
  <div class="contextual">
    <%= link_to_remote_if_authorized image_tag('comment.png'), { :url => {:action => 'quote', :id => message} }, :title => l(:button_quote) %>
    <%= link_to(image_tag('edit.png'), {:action => 'edit', :id => message}, :title => l(:button_edit)) if message.editable_by?(User.current) %>
    <%= link_to(image_tag('delete.png'), {:action => 'destroy', :id => message}, :method => :post, :confirm => l(:text_are_you_sure), :title => l(:button_delete)) if message.destroyable_by?(User.current) %>
  </div>
  <div class="message reply">
  <h4><%=h message.subject %> - <%= authoring message.created_on, message.author %></h4>
  <div class="wiki"><%= textilizable message, :content, :attachments => message.attachments %></div>
  <%= link_to_attachments message, :author => false %>
  </div>
<% end %>
<% end %>

<% if !@topic.locked? && authorize_for('messages', 'reply') %>
<p><%= toggle_link l(:button_reply), "reply", :focus => 'message_content' %></p>
<div id="reply" style="display:none;">
<% form_for :reply, @reply, :url => {:action => 'reply', :id => @topic}, :html => {:multipart => true, :id => 'message-form'} do |f| %>
  <%= render :partial => 'form', :locals => {:f => f, :replying => true} %>
  <%= submit_tag l(:button_submit) %>
  <%= link_to_remote l(:label_preview), 
                     { :url => { :controller => 'messages', :action => 'preview', :board_id => @board },
                       :method => 'post',
                       :update => 'preview',
                       :with => "Form.serialize('message-form')",
                       :complete => "Element.scrollTo('preview')"
                     }, :accesskey => accesskey(:preview) %>
<% end %>
<div id="preview" class="wiki"></div>
</div>
<% end %>

<% content_for :header_tags do %>
  <%= stylesheet_link_tag 'scm' %>
<% end %>

<% html_title h(@topic.subject) %>

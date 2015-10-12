<fieldset id="filters"><legend><%= l(:label_date_range) %></legend>
<p>
<%= radio_button_tag 'period_type', '1', !@free_period %>
<%= select_tag 'period', options_for_period_select(params[:period]),
                         :onchange => 'this.form.onsubmit();',
                         :onfocus => '$("period_type_1").checked = true;' %>
</p>
<p>
<%= radio_button_tag 'period_type', '2', @free_period %>
<span onclick="$('period_type_2').checked = true;">
<%= l(:label_date_from) %>
<%= text_field_tag 'from', @from, :size => 10 %> <%= calendar_for('from') %>
<%= l(:label_date_to) %>
<%= text_field_tag 'to', @to, :size => 10 %> <%= calendar_for('to') %>
</span>
<%= submit_tag l(:button_apply), :name => nil %>
</p>
</fieldset>

<div class="tabs">
<% url_params = @free_period ? { :from => @from, :to => @to } : { :period => params[:period] } %>
<ul>
    <li><%= link_to(l(:label_details), url_params.merge({:controller => 'timelog', :action => 'details', :project_id => @project }),
                                       :class => (@controller.action_name == 'details' ? 'selected' : nil)) %></li>
    <li><%= link_to(l(:label_report), url_params.merge({:controller => 'timelog', :action => 'report', :project_id => @project}),
                                       :class => (@controller.action_name == 'report' ? 'selected' : nil)) %></li>
</ul>
</div>

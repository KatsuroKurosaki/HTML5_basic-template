"use strict";

function generateSideMenu() {
	var list_group_docs = $("ul.list-group-docs");
	$("div.section-docs section").each(function () {
		list_group_docs.append('<a href="#' + $(this).attr("id") + '" class="list-group-item list-group-item-action">' + $(this).find("h2").html() + '</a>');
	});
}
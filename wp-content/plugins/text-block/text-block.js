wp.blocks.registerBlockType("brad/border-box", {
	title: "Simple Box",
	icon: "smiley",
	category: "common",
	attributes: {
		content: { type: "string" },
		check: { type: "string" },
		flag: { type: "Boolean" },
	},
	edit: function (props) {
		function updateContent(event) {
			props.setAttributes({ content: event.target.value });
		}
		const checkEmail = () => {
			if (
				/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(
					props.attributes.content
				)
			) {
				props.setAttributes({
					check: "Email valid",
					flag: true,
				});
				return true;
			}
			props.setAttributes({
				check: "Email invalid",
				flag: false,
			});
			return false;
		};
		return React.createElement(
			"div",
			null,
			React.createElement("h3", null, "Add email"),
			React.createElement("input", {
				type: "text",
				value: props.attributes.content,
				onChange: updateContent,
			}),
			React.createElement(
				"button",
				{
					type: "button",
					onClick: checkEmail,
				},
				"Submit"
			),
			React.createElement(
				"p",
				{ style: { color: props.attributes.flag===true ? "green" : "red" } },
				props.attributes.check
			)
		);
	},
	save: function (props) {
		return wp.element.createElement(
			"h3",
			{ style: { border: "3px solid " + props.attributes.color } },
			props.attributes.content
		);
	},
});

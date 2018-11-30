$(document).ready(function() {
  var editor = document.getElementById("editor");

  function columnWidth(rows, columnIndex) {
    return Math.max.apply(
      null,
      rows.map(function(row) {
        return row[columnIndex].length;
      })
    );
  }

  function looksLikeTable(data) {
    return true;
  }

  editor.addEventListener("paste", function(event) {
    var clipboard = event.clipboardData;
    var data = clipboard.getData("text/plain").trim();

    if (looksLikeTable(data)) {
      event.preventDefault();
    } else {
      return;
    }

    var rows = data.split(/[\n\u0085\u2028\u2029]|\r\n?/g).map(function(row) {
      return row.split("\t");
    });

    var columnWidths = rows[0].map(function(column, columnIndex) {
      console.log(column);
      return columnWidth(rows, columnIndex);
    });

    var markdownRows = rows.map(function(row, rowIndex) {
      // | Name         | Title | Email Address  |
      // |--------------|-------|----------------|
      // | Jane Atler   | CEO   | jane@acme.com  |
      // | John Doherty | CTO   | john@acme.com  |
      // | Sally Smith  | CFO   | sally@acme.com |
      return (
        "| " +
        row
          .map(function(column, index) {
            return (
              column + Array(columnWidths[index] - column.length).join(" ")
            );
          })
          .join(" | ") +
        " |"
      );
      row.map;
    });

    markdownRows.splice(
      1,
      0,
      "| " +
        columnWidths
          .map(function(width, index) {
            return Array(columnWidths[index]).join("-");
          })
          .join(" | ") +
        " |"
    );

    // https://www.w3.org/TR/clipboard-apis/#the-paste-action
    // When pasting, the drag data store mode flag is read-only, hence calling
    // setData() from a paste event handler will not modify the data that is
    // inserted, and not modify the data on the clipboard.
    event.target.value = markdownRows.join("\n");

    // Render the markdown table to HTML
    $("#Markdown").html(marked(event.target.value, { sanitize: true }));

    // Add bootstrap classes
    $("#Markdown table").addClass("table table-hover table-striped");

    return false;
  });
});

$(function () {

    var sud = new Sudoku();

    sud.start(
        [
            [0, 0, 1, 0, 4, 0, 0, 5, 6],
            [5, 0, 0, 2, 1, 3, 7, 0, 0],
            [3, 0, 8, 0, 0, 7, 0, 0, 1],
            [0, 0, 0, 0, 0, 5, 1, 0, 0],
            [9, 0, 0, 1, 0, 2, 0, 0, 3],
            [0, 0, 2, 9, 0, 0, 0, 0, 0],
            [4, 0, 0, 3, 0, 0, 2, 0, 7],
            [0, 0, 7, 5, 6, 4, 0, 0, 9],
            [1, 9, 0, 0, 2, 0, 5, 0, 0]
        ]
    );

});

var Sudoku = function() {
    return {
        start : function(grid) {
            for (var y = 0; y < grid.length; y++) {
                for (var x = 0; x < grid[y].length; x++) {
                    var value  = grid[y][x],
                        xCoord = x + 1,
                        yCoord = y + 1;
                    if (value > 0) {
                        $("input[name='cell[" + xCoord + "][" + yCoord + "]']").val(value).prop('disabled', true);
                    }
                }
            }
        }
    };
};

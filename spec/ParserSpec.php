<?php

describe("result", function() {
    it("succeeds without consuming any of the string", function() {
        expect(result("hello")->run("world"))->toEqual(ImmList(Pair("hello", "world")));
    });
});

describe("zero", function(){
    it("always return an empty list, which means failure", function(){
        expect(zero()->run("world"))->toEqual(Nil());
    });
});

describe("item", function() {
    it("parses a string and returns the first character", function() {
        expect(item()->run("hello"))->toEqual(ImmList(Pair('h', "ello")));
    });
});

describe("seq", function() {
    it("applies parsers in sequence", function() {
        expect(seq(item(), item())->run("hello"))->toEqual(ImmList(Pair(Pair('h', 'e'), "llo")));
    });
});
